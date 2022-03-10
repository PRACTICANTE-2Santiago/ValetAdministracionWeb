<?php
require('fpdf/fpdf.php');

class PDF_MC_Table extends FPDF
{
	var $widths;
	var $aligns;
	var $bord;
	var $BR;
	var $BV;
	var $BA;
	var $FR;
	var $FV;
	var $FA;
	var $espaY;
	var $espaX;
	var $fond;
	
	function SetWidths($w)
	{
		//Set the array of column widths
		$this->widths=$w;
	}
	
	function SetAligns($a)
	{
		//Set the array of column alignments
		$this->aligns=$a;
	}
	
	function DibBord($b)
	{
		//Set the array of column widths
		$this->bord=$b;
	}
	
	function BordeColor($c1,$c2,$c3)
	{
		$this->BR=$c1;
		$this->BV=$c2;
		$this->BA=$c3;
	}
	
	function Fondsi($c1)
	{
		$this->fond=$c1;
	}
	
	function FondColor($c1,$c2,$c3)
	{
		$this->FR=$c1;
		$this->FV=$c2;
		$this->FA=$c3;
	}
	
	function Espacios($c1,$c2)
	{
		$this->espaX=$c1;
		$this->espaY=$c2;
	}
	
	function Row($data)
	{
		$espa = array(isset($this->espaX) ? $this->espaX : 0,isset($this->espaY) ? $this->espaY : 0); 
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=5*$nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h);
		//Draw the cells of the row
		$this->SetY($this->GetY() + $espa[1]);
		
		$BBR=isset($this->BR) ? $this->BR : 0;
		$BBV=isset($this->BV) ? $this->BV : 0;
		$BBA=isset($this->BA) ? $this->BA : 0;
		$this->SetDrawColor($BBR,$BBV,$BBA);
		
		$FFR=isset($this->FR) ? $this->FR : 0;
		$FFV=isset($this->FV) ? $this->FV : 0;
		$FFA=isset($this->FA) ? $this->FA : 0;
		$this->SetFillColor($FFR,$FFV,$FFA);
		
		for($i=0;$i<count($data);$i++)
		{
			$this->SetX($this->GetX() + $espa[0]);
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
			//Dibuja Borde
			$borde[$i]=isset($this->bord[$i]) ? $this->bord[$i] : 1;
			if($borde[$i]==1) $this->Rect($x,$y,$w,$h,'DF');
			//Print the text
			$this->MultiCell($w,5,$data[$i],0,$a);
			//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
		//Go to the next line
		$this->Ln($h);
	}
	
	function CheckPageBreak($h)
	{
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}
	
	function NbLines($w,$txt)
	{
		//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}
}
?>

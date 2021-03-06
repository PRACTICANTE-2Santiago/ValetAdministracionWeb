/**
 * (c) 2010-2017 Torstein Honsi
 *
 * License: www.highcharts.com/license
 */
'use strict';
import H from './Globals.js';
import './Color.js';
import './Utilities.js';
import './Time.js';

var color = H.color,
    isTouchDevice = H.isTouchDevice,
    merge = H.merge,
    svg = H.svg;

/* ****************************************************************************
 * Handle the options                                                         *
 *****************************************************************************/
/**
 * @optionparent
 */
H.defaultOptions = {
    


    /**
     * Styled mode only. Configuration object for adding SVG definitions for
     * reusable elements. See [gradients, shadows and patterns](http://www.
     * highcharts.com/docs/chart-design-and-style/gradients-shadows-and-
     * patterns) for more information and code examples.
     *
     * @type {Object}
     * @since 5.0.0
     * @apioption defs
     */

    /**
     * @ignore-option
     */
    symbols: ['circle', 'diamond', 'square', 'triangle', 'triangle-down'],
    lang: {

        /**
         * The loading text that appears when the chart is set into the loading
         * state following a call to `chart.showLoading`.
         *
         * @type {String}
         * @default Loading...
         */
        loading: 'Loading...',

        /**
         * An array containing the months names. Corresponds to the `%B` format
         * in `Highcharts.dateFormat()`.
         *
         * @type {Array<String>}
         * @default [ "January" , "February" , "March" , "April" , "May" ,
         *          "June" , "July" , "August" , "September" , "October" ,
         *          "November" , "December"]
         */
        months: [
            'January', 'February', 'March', 'April', 'May', 'June', 'July',
            'August', 'September', 'October', 'November', 'December'
        ],

        /**
         * An array containing the months names in abbreviated form. Corresponds
         * to the `%b` format in `Highcharts.dateFormat()`.
         *
         * @type {Array<String>}
         * @default [ "Jan" , "Feb" , "Mar" , "Apr" , "May" , "Jun" ,
         *          "Jul" , "Aug" , "Sep" , "Oct" , "Nov" , "Dec"]
         */
        shortMonths: [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul',
            'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ],

        /**
         * An array containing the weekday names.
         *
         * @type {Array<String>}
         * @default ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday",
         *          "Friday", "Saturday"]
         */
        weekdays: [
            'Sunday', 'Monday', 'Tuesday', 'Wednesday',
            'Thursday', 'Friday', 'Saturday'
        ],

        /**
         * Short week days, starting Sunday. If not specified, Highcharts uses
         * the first three letters of the `lang.weekdays` option.
         *
         * @type {Array<String>}
         * @sample highcharts/lang/shortweekdays/
         *         Finnish two-letter abbreviations
         * @since 4.2.4
         * @apioption lang.shortWeekdays
         */

        /**
         * What to show in a date field for invalid dates. Defaults to an empty
         * string.
         *
         * @type {String}
         * @since 4.1.8
         * @product highcharts highstock
         * @apioption lang.invalidDate
         */

        /**
         * The default decimal point used in the `Highcharts.numberFormat`
         * method unless otherwise specified in the function arguments.
         *
         * @type {String}
         * @default .
         * @since 1.2.2
         */
        decimalPoint: '.',

        /**
         * [Metric prefixes](http://en.wikipedia.org/wiki/Metric_prefix) used
         * to shorten high numbers in axis labels. Replacing any of the
         * positions with `null` causes the full number to be written. Setting
         * `numericSymbols` to `null` disables shortening altogether.
         *
         * @type {Array<String>}
         * @sample {highcharts} highcharts/lang/numericsymbols/
         *         Replacing the symbols with text
         * @sample {highstock} highcharts/lang/numericsymbols/
         *         Replacing the symbols with text
         * @default [ "k" , "M" , "G" , "T" , "P" , "E"]
         * @since 2.3.0
         */
        numericSymbols: ['k', 'M', 'G', 'T', 'P', 'E'],

        /**
         * The magnitude of [numericSymbols](#lang.numericSymbol) replacements.
         * Use 10000 for Japanese, Korean and various Chinese locales, which
         * use symbols for 10^4, 10^8 and 10^12.
         *
         * @type {Number}
         * @sample highcharts/lang/numericsymbolmagnitude/
         *         10000 magnitude for Japanese
         * @default 1000
         * @since 5.0.3
         * @apioption lang.numericSymbolMagnitude
         */

        /**
         * The text for the label appearing when a chart is zoomed.
         *
         * @type {String}
         * @default Reset zoom
         * @since 1.2.4
         */
        resetZoom: 'Reset zoom',

        /**
         * The tooltip title for the label appearing when a chart is zoomed.
         *
         * @type {String}
         * @default Reset zoom level 1:1
         * @since 1.2.4
         */
        resetZoomTitle: 'Reset zoom level 1:1',

        /**
         * The default thousands separator used in the `Highcharts.numberFormat`
         * method unless otherwise specified in the function arguments. Since
         * Highcharts 4.1 it defaults to a single space character, which is
         * compatible with ISO and works across Anglo-American and continental
         * European languages.
         *
         * The default is a single space.
         *
         * @type {String}
         * @default
         * @since 1.2.2
         */
        thousandsSep: ' '
    },

    /**
     * Global options that don't apply to each chart. These options, like
     * the `lang` options, must be set using the `Highcharts.setOptions`
     * method.
     *
     * <pre>Highcharts.setOptions({
     *     global: {
     *         useUTC: false
     *     }
     * });</pre>
     *
     */

    /**
     * _Canvg rendering for Android 2.x is removed as of Highcharts 5.0\.
     * Use the [libURL](#exporting.libURL) option to configure exporting._
     *
     * The URL to the additional file to lazy load for Android 2.x devices.
     * These devices don't support SVG, so we download a helper file that
     * contains [canvg](http://code.google.com/p/canvg/), its dependency
     * rbcolor, and our own CanVG Renderer class. To avoid hotlinking to
     * our site, you can install canvas-tools.js on your own server and
     * change this option accordingly.
     *
     * @type {String}
     * @deprecated
     * @default http://code.highcharts.com/{version}/modules/canvas-tools.js
     * @product highcharts highmaps
     * @apioption global.canvasToolsURL
     */

    /**
     * This option is deprecated since v6.0.5. Instead, use
     * [time.useUTC](#time.useUTC) that supports individual time settings
     * per chart.
     *
     * @deprecated
     * @type {Boolean}
     * @apioption global.useUTC
     */

    /**
     * This option is deprecated since v6.0.5. Instead, use
     * [time.Date](#time.Date) that supports individual time settings
     * per chart.
     *
     * @deprecated
     * @type {Object}
     * @product highcharts highstock
     * @apioption global.Date
     */

    /**
     * This option is deprecated since v6.0.5. Instead, use
     * [time.getTimezoneOffset](#time.getTimezoneOffset) that supports
     * individual time settings per chart.
     *
     * @deprecated
     * @type {Function}
     * @product highcharts highstock
     * @apioption global.getTimezoneOffset
     */

    /**
     * This option is deprecated since v6.0.5. Instead, use
     * [time.timezone](#time.timezone) that supports individual time
     * settings per chart.
     *
     * @deprecated
     * @type {String}
     * @product highcharts highstock
     * @apioption global.timezone
     */

    /**
     * This option is deprecated since v6.0.5. Instead, use
     * [time.timezoneOffset](#time.timezoneOffset) that supports individual
     * time settings per chart.
     *
     * @deprecated
     * @type {Number}
     * @product highcharts highstock
     * @apioption global.timezoneOffset
     */
    global: {},


    time: H.Time.prototype.defaultOptions,

    /**
     * General options for the chart.
     * @type {Object}
     */
    chart: {

        /**
         * When using multiple axis, the ticks of two or more opposite axes
         * will automatically be aligned by adding ticks to the axis or axes
         * with the least ticks, as if `tickAmount` were specified.
         *
         * This can be prevented by setting `alignTicks` to false. If the grid
         * lines look messy, it's a good idea to hide them for the secondary
         * axis by setting `gridLineWidth` to 0.
         *
         * If `startOnTick` or `endOnTick` in an Axis options are set to false,
         * then the `alignTicks ` will be disabled for the Axis.
         *
         * Disabled for logarithmic axes.
         *
         * @type      {Boolean}
         * @sample    {highcharts} highcharts/chart/alignticks-true/
         *            True by default
         * @sample    {highcharts} highcharts/chart/alignticks-false/
         *            False
         * @sample    {highstock} stock/chart/alignticks-true/
         *            True by default
         * @sample    {highstock} stock/chart/alignticks-false/
         *            False
         * @default   true
         * @product   highcharts highstock
         * @apioption chart.alignTicks
         */


        /**
         * Set the overall animation for all chart updating. Animation can be
         * disabled throughout the chart by setting it to false here. It can
         * be overridden for each individual API method as a function parameter.
         * The only animation not affected by this option is the initial series
         * animation, see [plotOptions.series.animation](
         * #plotOptions.series.animation).
         *
         * The animation can either be set as a boolean or a configuration
         * object. If `true`, it will use the 'swing' jQuery easing and a
         * duration of 500 ms. If used as a configuration object, the following
         * properties are supported:
         *
         * <dl>
         *
         * <dt>duration</dt>
         *
         * <dd>The duration of the animation in milliseconds.</dd>
         *
         * <dt>easing</dt>
         *
         * <dd>A string reference to an easing function set on the `Math`
         * object. See [the easing demo](
         * http://jsfiddle.net/gh/get/library/pure/highcharts/highcharts/tree/master/samples/highcharts/plotoptions/series-animation-easing/).
         * </dd>
         *
         * </dl>
         *
         * @type {Boolean|Object}
         * @sample {highcharts} highcharts/chart/animation-none/
         *         Updating with no animation
         * @sample {highcharts} highcharts/chart/animation-duration/
         *         With a longer duration
         * @sample {highcharts} highcharts/chart/animation-easing/
         *         With a jQuery UI easing
         * @sample {highmaps} maps/chart/animation-none/
         *         Updating with no animation
         * @sample {highmaps} maps/chart/animation-duration/
         *         With a longer duration
         * @default true
         * @apioption chart.animation
         */

        /**
         * A CSS class name to apply to the charts container `div`, allowing
         * unique CSS styling for each chart.
         *
         * @type {String}
         * @apioption chart.className
         */

        /**
         * Event listeners for the chart.
         *
         * @apioption chart.events
         */

        /**
         * Fires when a series is added to the chart after load time, using
         * the `addSeries` method. One parameter, `event`, is passed to the
         * function, containing common event information.
         * Through `event.options` you can access the series options that was
         * passed to the `addSeries` method. Returning false prevents the series
         * from being added.
         *
         * @type {Function}
         * @context Chart
         * @sample {highcharts} highcharts/chart/events-addseries/ Alert on add series
         * @sample {highstock} stock/chart/events-addseries/ Alert on add series
         * @since 1.2.0
         * @apioption chart.events.addSeries
         */

        /**
         * Fires when clicking on the plot background. One parameter, `event`,
         * is passed to the function, containing common event information.
         *
         * Information on the clicked spot can be found through `event.xAxis`
         * and `event.yAxis`, which are arrays containing the axes of each
         * dimension and each axis' value at the clicked spot. The primary axes
         * are `event.xAxis[0]` and `event.yAxis[0]`. Remember the unit of a
         * datetime axis is milliseconds since 1970-01-01 00:00:00.
         *
         * <pre>click: function(e) {
         *     console.log(
         *         Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', e.xAxis[0].value),
         *         e.yAxis[0].value
         *     )
         * }</pre>
         *
         * @type {Function}
         * @context Chart
         * @sample {highcharts} highcharts/chart/events-click/
         *         Alert coordinates on click
         * @sample {highcharts} highcharts/chart/events-container/
         *         Alternatively, attach event to container
         * @sample {highstock} stock/chart/events-click/
         *         Alert coordinates on click
         * @sample {highstock} highcharts/chart/events-container/
         *         Alternatively, attach event to container
         * @sample {highmaps} maps/chart/events-click/
         *         Record coordinates on click
         * @sample {highmaps} highcharts/chart/events-container/
         *         Alternatively, attach event to container
         * @since 1.2.0
         * @apioption chart.events.click
         */


        /**
         * Fires when the chart is finished loading. Since v4.2.2, it also waits
         * for images to be loaded, for example from point markers. One
         * parameter, `event`, is passed to the function, containing common
         * event information.
         *
         * There is also a second parameter to the chart constructor where a
         * callback function can be passed to be executed on chart.load.
         *
         * @type {Function}
         * @context Chart
         * @sample {highcharts} highcharts/chart/events-load/
         *         Alert on chart load
         * @sample {highstock} stock/chart/events-load/
         *         Alert on chart load
         * @sample {highmaps} maps/chart/events-load/
         *         Add series on chart load
         * @apioption chart.events.load
         */

        /**
         * Fires when the chart is redrawn, either after a call to
         * `chart.redraw()` or after an axis, series or point is modified with
         * the `redraw` option set to true. One parameter, `event`, is passed to
         * the function, containing common event information.
         *
         * @type {Function}
         * @context Chart
         * @sample {highcharts} highcharts/chart/events-redraw/
         *         Alert on chart redraw
         * @sample {highstock} stock/chart/events-redraw/
         *         Alert on chart redraw when adding a series or moving the
         *         zoomed range
         * @sample {highmaps} maps/chart/events-redraw/
         *         Set subtitle on chart redraw
         * @since 1.2.0
         * @apioption chart.events.redraw
         */

        /**
         * Fires after initial load of the chart (directly after the `load`
         * event), and after each redraw (directly after the `redraw` event).
         *
         * @type {Function}
         * @context Chart
         * @since 5.0.7
         * @apioption chart.events.render
         */

        /**
         * Fires when an area of the chart has been selected. Selection is
         * enabled by setting the chart's zoomType. One parameter, `event`, is
         * passed to the function, containing common event information. The
         * default action for the selection event is to zoom the chart to the
         * selected area. It can be prevented by calling
         * `event.preventDefault()`.
         *
         * Information on the selected area can be found through `event.xAxis`
         * and `event.yAxis`, which are arrays containing the axes of each
         * dimension and each axis' min and max values. The primary axes are
         * `event.xAxis[0]` and `event.yAxis[0]`. Remember the unit of a
         * datetime axis is milliseconds since 1970-01-01 00:00:00.
         *
         * <pre>selection: function(event) {
         *     // log the min and max of the primary, datetime x-axis
         *     console.log(
         *         Highcharts.dateFormat(
         *             '%Y-%m-%d %H:%M:%S',
         *             event.xAxis[0].min
         *         ),
         *         Highcharts.dateFormat(
         *             '%Y-%m-%d %H:%M:%S',
         *             event.xAxis[0].max
         *         )
         *     );
         *     // log the min and max of the y axis
         *     console.log(event.yAxis[0].min, event.yAxis[0].max);
         * }</pre>
         *
         * @type {Function}
         * @sample {highcharts} highcharts/chart/events-selection/
         *         Report on selection and reset
         * @sample {highcharts} highcharts/chart/events-selection-points/
         *         Select a range of points through a drag selection
         * @sample {highstock} stock/chart/events-selection/
         *         Report on selection and reset
         * @sample {highstock} highcharts/chart/events-selection-points/
         *         Select a range of points through a drag selection
         *         (Highcharts)
         * @apioption chart.events.selection
         */

        /**
         * The margin between the outer edge of the chart and the plot area.
         * The numbers in the array designate top, right, bottom and left
         * respectively. Use the options `marginTop`, `marginRight`,
         * `marginBottom` and `marginLeft` for shorthand setting of one option.
         *
         * By default there is no margin. The actual space is dynamically
         * calculated from the offset of axis labels, axis title, title,
         * subtitle and legend in addition to the `spacingTop`, `spacingRight`,
         * `spacingBottom` and `spacingLeft` options.
         *
         * @type {Array}
         * @sample {highcharts} highcharts/chart/margins-zero/
         *         Zero margins
         * @sample {highstock} stock/chart/margin-zero/
         *         Zero margins
         *
         * @defaults {all} null
         * @apioption chart.margin
         */

        /**
         * The margin between the bottom outer edge of the chart and the plot
         * area. Use this to set a fixed pixel value for the margin as opposed
         * to the default dynamic margin. See also `spacingBottom`.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/chart/marginbottom/
         *         100px bottom margin
         * @sample {highstock} stock/chart/marginbottom/
         *         100px bottom margin
         * @sample {highmaps} maps/chart/margin/
         *         100px margins
         * @since 2.0
         * @apioption chart.marginBottom
         */

        /**
         * The margin between the left outer edge of the chart and the plot
         * area. Use this to set a fixed pixel value for the margin as opposed
         * to the default dynamic margin. See also `spacingLeft`.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/chart/marginleft/
         *         150px left margin
         * @sample {highstock} stock/chart/marginleft/
         *         150px left margin
         * @sample {highmaps} maps/chart/margin/
         *         100px margins
         * @default null
         * @since 2.0
         * @apioption chart.marginLeft
         */

        /**
         * The margin between the right outer edge of the chart and the plot
         * area. Use this to set a fixed pixel value for the margin as opposed
         * to the default dynamic margin. See also `spacingRight`.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/chart/marginright/
         *         100px right margin
         * @sample {highstock} stock/chart/marginright/
         *         100px right margin
         * @sample {highmaps} maps/chart/margin/
         *         100px margins
         * @default null
         * @since 2.0
         * @apioption chart.marginRight
         */

        /**
         * The margin between the top outer edge of the chart and the plot area.
         * Use this to set a fixed pixel value for the margin as opposed to
         * the default dynamic margin. See also `spacingTop`.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/chart/margintop/ 100px top margin
         * @sample {highstock} stock/chart/margintop/
         *         100px top margin
         * @sample {highmaps} maps/chart/margin/
         *         100px margins
         * @default null
         * @since 2.0
         * @apioption chart.marginTop
         */

        /**
         * Allows setting a key to switch between zooming and panning. Can be
         * one of `alt`, `ctrl`, `meta` (the command key on Mac and Windows
         * key on Windows) or `shift`. The keys are mapped directly to the key
         * properties of the click event argument (`event.altKey`,
         * `event.ctrlKey`, `event.metaKey` and `event.shiftKey`).
         *
         * @validvalue [null, "alt", "ctrl", "meta", "shift"]
         * @type {String}
         * @since 4.0.3
         * @product highcharts
         * @apioption chart.panKey
         */

        /**
         * Allow panning in a chart. Best used with [panKey](#chart.panKey)
         * to combine zooming and panning.
         *
         * On touch devices, when the [tooltip.followTouchMove](
         * #tooltip.followTouchMove) option is `true` (default), panning
         * requires two fingers. To allow panning with one finger, set
         * `followTouchMove` to `false`.
         *
         * @type {Boolean}
         * @sample {highcharts} highcharts/chart/pankey/ Zooming and panning
         * @default {highcharts} false
         * @default {highstock} true
         * @since 4.0.3
         * @product highcharts highstock
         * @apioption chart.panning
         */


        /**
         * Equivalent to [zoomType](#chart.zoomType), but for multitouch
         * gestures only. By default, the `pinchType` is the same as the
         * `zoomType` setting. However, pinching can be enabled separately in
         * some cases, for example in stock charts where a mouse drag pans the
         * chart, while pinching is enabled. When [tooltip.followTouchMove](
         * #tooltip.followTouchMove) is true, pinchType only applies to
         * two-finger touches.
         *
         * @validvalue [null, "x", "y", "xy"]
         * @type {String}
         * @default {highcharts} null
         * @default {highstock} x
         * @since 3.0
         * @product highcharts highstock
         * @apioption chart.pinchType
         */

        /**
         * The corner radius of the outer chart border.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/chart/borderradius/ 20px radius
         * @sample {highstock} stock/chart/border/ 10px radius
         * @sample {highmaps} maps/chart/border/ Border options
         * @default 0
         */
        borderRadius: 0,
        

        /**
         * In styled mode, this sets how many colors the class names
         * should rotate between. With ten colors, series (or points) are
         * given class names like `highcharts-color-0`, `highcharts-color-0`
         * [...] `highcharts-color-9`. The equivalent in non-styled mode
         * is to set colors using the [colors](#colors) setting.
         *
         * @type {Number}
         * @default 10
         * @since 5.0.0
         */
        colorCount: 10,
        

        /**
         * Alias of `type`.
         *
         * @validvalue ["line", "spline", "column", "area", "areaspline", "pie"]
         * @type {String}
         * @deprecated
         * @sample {highcharts} highcharts/chart/defaultseriestype/ Bar
         * @default line
         * @product highcharts
         */
        defaultSeriesType: 'line',

        /**
         * If true, the axes will scale to the remaining visible series once
         * one series is hidden. If false, hiding and showing a series will
         * not affect the axes or the other series. For stacks, once one series
         * within the stack is hidden, the rest of the stack will close in
         * around it even if the axis is not affected.
         *
         * @type {Boolean}
         * @sample {highcharts} highcharts/chart/ignorehiddenseries-true/
         *         True by default
         * @sample {highcharts} highcharts/chart/ignorehiddenseries-false/
         *         False
         * @sample {highcharts} highcharts/chart/ignorehiddenseries-true-stacked/
         *         True with stack
         * @sample {highstock} stock/chart/ignorehiddenseries-true/
         *         True by default
         * @sample {highstock} stock/chart/ignorehiddenseries-false/
         *         False
         * @default true
         * @since 1.2.0
         * @product highcharts highstock
         */
        ignoreHiddenSeries: true,


        /**
         * Whether to invert the axes so that the x axis is vertical and y axis
         * is horizontal. When `true`, the x axis is [reversed](#xAxis.reversed)
         * by default.
         *
         * @productdesc {highcharts}
         * If a bar series is present in the chart, it will be inverted
         * automatically. Inverting the chart doesn't have an effect if there
         * are no cartesian series in the chart, or if the chart is
         * [polar](#chart.polar).
         *
         * @type {Boolean}
         * @sample {highcharts} highcharts/chart/inverted/
         *         Inverted line
         * @sample {highstock} stock/navigator/inverted/
         *         Inverted stock chart
         * @default false
         * @product highcharts highstock
         * @apioption chart.inverted
         */

        /**
         * The distance between the outer edge of the chart and the content,
         * like title or legend, or axis title and labels if present. The
         * numbers in the array designate top, right, bottom and left
         * respectively. Use the options spacingTop, spacingRight, spacingBottom
         * and spacingLeft options for shorthand setting of one option.
         *
         * @type {Array<Number>}
         * @see [chart.margin](#chart.margin)
         * @default [10, 10, 15, 10]
         * @since 3.0.6
         */
        spacing: [10, 10, 15, 10],

        /**
         * The button that appears after a selection zoom, allowing the user
         * to reset zoom.
         *
         */
        resetZoomButton: {

            /**
             * What frame the button should be placed related to. Can be either
             * `plot` or `chart`
             *
             * @validvalue ["plot", "chart"]
             * @type {String}
             * @sample {highcharts} highcharts/chart/resetzoombutton-relativeto/
             *         Relative to the chart
             * @sample {highstock} highcharts/chart/resetzoombutton-relativeto/
             *         Relative to the chart
             * @default plot
             * @since 2.2
             * @apioption chart.resetZoomButton.relativeTo
             */

            /**
             * A collection of attributes for the button. The object takes SVG
             * attributes like `fill`, `stroke`, `stroke-width` or `r`, the
             * border radius. The theme also supports `style`, a collection of
             * CSS properties for the text. Equivalent attributes for the hover
             * state are given in `theme.states.hover`.
             *
             * @type {Object}
             * @sample {highcharts} highcharts/chart/resetzoombutton-theme/
             *         Theming the button
             * @sample {highstock} highcharts/chart/resetzoombutton-theme/
             *         Theming the button
             * @since 2.2
             */
            theme: {

                /**
                 * The Z index for the reset zoom button. The default value
                 * places it below the tooltip that has Z index 7.
                 */
                zIndex: 6
            },

            /**
             * The position of the button.
             *
             * @type {Object}
             * @sample {highcharts} highcharts/chart/resetzoombutton-position/
             *         Above the plot area
             * @sample {highstock} highcharts/chart/resetzoombutton-position/
             *         Above the plot area
             * @sample {highmaps} highcharts/chart/resetzoombutton-position/
             *         Above the plot area
             * @since 2.2
             */
            position: {

                /**
                 * The horizontal alignment of the button.
                 *
                 * @type {String}
                 */
                align: 'right',

                /**
                 * The horizontal offset of the button.
                 *
                 * @type {Number}
                 */
                x: -10,

                /**
                 * The vertical alignment of the button.
                 *
                 * @validvalue ["top", "middle", "bottom"]
                 * @type {String}
                 * @default top
                 * @apioption chart.resetZoomButton.position.verticalAlign
                 */

                /**
                 * The vertical offset of the button.
                 *
                 * @type {Number}
                 */
                y: 10
            }
        },

        /**
         * The pixel width of the plot area border.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/chart/plotborderwidth/ 1px border
         * @sample {highstock} stock/chart/plotborder/
         *         2px border
         * @sample {highmaps} maps/chart/plotborder/
         *         Plot border options
         * @default 0
         * @apioption chart.plotBorderWidth
         */

        /**
         * Whether to apply a drop shadow to the plot area. Requires that
         * plotBackgroundColor be set. The shadow can be an object configuration
         * containing `color`, `offsetX`, `offsetY`, `opacity` and `width`.
         *
         * @type {Boolean|Object}
         * @sample {highcharts} highcharts/chart/plotshadow/ Plot shadow
         * @sample {highstock} stock/chart/plotshadow/
         *         Plot shadow
         * @sample {highmaps} maps/chart/plotborder/
         *         Plot border options
         * @default false
         * @apioption chart.plotShadow
         */

        /**
         * When true, cartesian charts like line, spline, area and column are
         * transformed into the polar coordinate system. Requires
         * `highcharts-more.js`.
         *
         * @sample {highcharts} highcharts/demo/polar/
         *         Polar chart
         * @sample {highcharts} highcharts/demo/polar-wind-rose/
         *         Wind rose, stacked polar column chart
         * @sample {highcharts} highcharts/demo/polar-spider/
         *         Spider web chart
         * @sample {highcharts} highcharts/parallel-coordinates/polar/
         *         Star plot, multivariate data in a polar chart
         *
         * @type {Boolean}
         * @default false
         * @since 2.3.0
         * @product highcharts
         * @apioption chart.polar
         */

        /**
         * Whether to reflow the chart to fit the width of the container div
         * on resizing the window.
         *
         * @type {Boolean}
         * @sample {highcharts} highcharts/chart/reflow-true/ True by default
         * @sample {highcharts} highcharts/chart/reflow-false/ False
         * @sample {highstock} stock/chart/reflow-true/
         *         True by default
         * @sample {highstock} stock/chart/reflow-false/
         *         False
         * @sample {highmaps} maps/chart/reflow-true/
         *         True by default
         * @sample {highmaps} maps/chart/reflow-false/
         *         False
         * @default true
         * @since 2.1
         * @apioption chart.reflow
         */

        /**
         * The HTML element where the chart will be rendered. If it is a string,
         * the element by that id is used. The HTML element can also be passed
         * by direct reference, or as the first argument of the chart
         * constructor, in which case the option is not needed.
         *
         * @type {String|Object}
         * @sample {highcharts} highcharts/chart/reflow-true/
         *         String
         * @sample {highcharts} highcharts/chart/renderto-object/
         *         Object reference
         * @sample {highcharts} highcharts/chart/renderto-jquery/
         *         Object reference through jQuery
         * @sample {highstock} stock/chart/renderto-string/
         *         String
         * @sample {highstock} stock/chart/renderto-object/
         *         Object reference
         * @sample {highstock} stock/chart/renderto-jquery/
         *         Object reference through jQuery
         * @apioption chart.renderTo
         */

        /**
         * The background color of the marker square when selecting (zooming
         * in on) an area of the chart.
         *
         * @type {Color}
         * @see In styled mode, the selection marker fill is set with the
         * `.highcharts-selection-marker` class.
         * @default rgba(51,92,173,0.25)
         * @since 2.1.7
         * @apioption chart.selectionMarkerFill
         */

        /**
         * Whether to apply a drop shadow to the outer chart area. Requires
         * that backgroundColor be set. The shadow can be an object
         * configuration containing `color`, `offsetX`, `offsetY`, `opacity` and
         * `width`.
         *
         * @type {Boolean|Object}
         * @sample {highcharts} highcharts/chart/shadow/ Shadow
         * @sample {highstock} stock/chart/shadow/
         *         Shadow
         * @sample {highmaps} maps/chart/border/
         *         Chart border and shadow
         * @default false
         * @apioption chart.shadow
         */

        /**
         * Whether to show the axes initially. This only applies to empty charts
         * where series are added dynamically, as axes are automatically added
         * to cartesian series.
         *
         * @type {Boolean}
         * @sample {highcharts} highcharts/chart/showaxes-false/ False by default
         * @sample {highcharts} highcharts/chart/showaxes-true/ True
         * @since 1.2.5
         * @product highcharts
         * @apioption chart.showAxes
         */

        /**
         * The space between the bottom edge of the chart and the content (plot
         * area, axis title and labels, title, subtitle or legend in top
         * position).
         *
         * @type {Number}
         * @sample {highcharts} highcharts/chart/spacingbottom/
         *         Spacing bottom set to 100
         * @sample {highstock} stock/chart/spacingbottom/
         *         Spacing bottom set to 100
         * @sample {highmaps} maps/chart/spacing/
         *         Spacing 100 all around
         * @default 15
         * @since 2.1
         * @apioption chart.spacingBottom
         */

        /**
         * The space between the left edge of the chart and the content (plot
         * area, axis title and labels, title, subtitle or legend in top
         * position).
         *
         * @type {Number}
         * @sample {highcharts} highcharts/chart/spacingleft/
         *         Spacing left set to 100
         * @sample {highstock} stock/chart/spacingleft/
         *         Spacing left set to 100
         * @sample {highmaps} maps/chart/spacing/
         *         Spacing 100 all around
         * @default 10
         * @since 2.1
         * @apioption chart.spacingLeft
         */

        /**
         * The space between the right edge of the chart and the content (plot
         * area, axis title and labels, title, subtitle or legend in top
         * position).
         *
         * @type {Number}
         * @sample {highcharts} highcharts/chart/spacingright-100/
         *         Spacing set to 100
         * @sample {highcharts} highcharts/chart/spacingright-legend/
         *         Legend in right position with default spacing
         * @sample {highstock} stock/chart/spacingright/
         *         Spacing set to 100
         * @sample {highmaps} maps/chart/spacing/
         *         Spacing 100 all around
         * @default 10
         * @since 2.1
         * @apioption chart.spacingRight
         */

        /**
         * The space between the top edge of the chart and the content (plot
         * area, axis title and labels, title, subtitle or legend in top
         * position).
         *
         * @type {Number}
         * @sample {highcharts} highcharts/chart/spacingtop-100/
         *         A top spacing of 100
         * @sample {highcharts} highcharts/chart/spacingtop-10/
         *         Floating chart title makes the plot area align to the default
         *         spacingTop of 10.
         * @sample {highstock} stock/chart/spacingtop/
         *         A top spacing of 100
         * @sample {highmaps} maps/chart/spacing/
         *         Spacing 100 all around
         * @default 10
         * @since 2.1
         * @apioption chart.spacingTop
         */

        /**
         * Additional CSS styles to apply inline to the container `div`. Note
         * that since the default font styles are applied in the renderer, it
         * is ignorant of the individual chart options and must be set globally.
         *
         * @type {CSSObject}
         * @see    In styled mode, general chart styles can be set with the
         *         `.highcharts-root` class.
         * @sample {highcharts} highcharts/chart/style-serif-font/
         *         Using a serif type font
         * @sample {highcharts} highcharts/css/em/
         *         Styled mode with relative font sizes
         * @sample {highstock} stock/chart/style/
         *         Using a serif type font
         * @sample {highmaps} maps/chart/style-serif-font/
         *         Using a serif type font
         * @default {"fontFamily":"\"Lucida Grande\", \"Lucida Sans Unicode\", Verdana, Arial, Helvetica, sans-serif","fontSize":"12px"}
         * @apioption chart.style
         */

        /**
         * The default series type for the chart. Can be any of the chart types
         * listed under [plotOptions](#plotOptions).
         *
         * @validvalue ["line", "spline", "column", "bar", "area", "areaspline", "pie", "arearange", "areasplinerange", "boxplot", "bubble", "columnrange", "errorbar", "funnel", "gauge", "heatmap", "polygon", "pyramid", "scatter", "solidgauge", "treemap", "waterfall"]
         * @type {String}
         * @sample {highcharts} highcharts/chart/type-bar/ Bar
         * @sample {highstock} stock/chart/type/
         *         Areaspline
         * @sample {highmaps} maps/chart/type-mapline/
         *         Mapline
         * @default {highcharts} line
         * @default {highstock} line
         * @default {highmaps} map
         * @since 2.1.0
         * @apioption chart.type
         */

        /**
         * Decides in what dimensions the user can zoom by dragging the mouse.
         * Can be one of `x`, `y` or `xy`.
         *
         * @validvalue [null, "x", "y", "xy"]
         * @type {String}
         * @see [panKey](#chart.panKey)
         * @default  null
         * @sample {highcharts} highcharts/chart/zoomtype-none/ None by default
         * @sample {highcharts} highcharts/chart/zoomtype-x/ X
         * @sample {highcharts} highcharts/chart/zoomtype-y/ Y
         * @sample {highcharts} highcharts/chart/zoomtype-xy/ Xy
         * @sample {highstock} stock/demo/basic-line/ None by default
         * @sample {highstock} stock/chart/zoomtype-x/ X
         * @sample {highstock} stock/chart/zoomtype-y/ Y
         * @sample {highstock} stock/chart/zoomtype-xy/ Xy
         * @product highcharts highstock
         * @apioption chart.zoomType
         */

        /**
         * An explicit width for the chart. By default (when `null`) the width
         * is calculated from the offset width of the containing element.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/chart/width/ 800px wide
         * @sample {highstock} stock/chart/width/ 800px wide
         * @sample {highmaps} maps/chart/size/ Chart with explicit size
         * @default null
         */
        width: null,

        /**
         * An explicit height for the chart. If a _number_, the height is
         * given in pixels. If given a _percentage string_ (for example
         * `'56%'`), the height is given as the percentage of the actual chart
         * width. This allows for preserving the aspect ratio across responsive
         * sizes.
         *
         * By default (when `null`) the height is calculated from the offset
         * height of the containing element, or 400 pixels if the containing
         * element's height is 0.
         *
         * @type {Number|String}
         * @sample {highcharts} highcharts/chart/height/
         *         500px height
         * @sample {highstock} stock/chart/height/
         *         300px height
         * @sample {highmaps} maps/chart/size/
         *         Chart with explicit size
         * @sample highcharts/chart/height-percent/
         *         Highcharts with percentage height
         * @default null
         */
        height: null

        

    },

    /**
     * The chart's main title.
     *
     * @sample {highmaps} maps/title/title/ Title options demonstrated
     */
    title: {

        /**
         * When the title is floating, the plot area will not move to make space
         * for it.
         *
         * @type {Boolean}
         * @sample {highcharts} highcharts/chart/zoomtype-none/ False by default
         * @sample {highcharts} highcharts/title/floating/
         *         True - title on top of the plot area
         * @sample {highstock} stock/chart/title-floating/
         *         True - title on top of the plot area
         * @default false
         * @since 2.1
         * @apioption title.floating
         */

        /**
         * CSS styles for the title. Use this for font styling, but use `align`,
         * `x` and `y` for text alignment.
         *
         * In styled mode, the title style is given in the `.highcharts-title`
         * class.
         *
         * @type {CSSObject}
         * @sample {highcharts} highcharts/title/style/ Custom color and weight
         * @sample {highstock} stock/chart/title-style/ Custom color and weight
         * @sample highcharts/css/titles/ Styled mode
         * @default {highcharts|highmaps} { "color": "#333333", "fontSize": "18px" }
         * @default {highstock} { "color": "#333333", "fontSize": "16px" }
         * @apioption title.style
         */

        /**
         * Whether to [use HTML](http://www.highcharts.com/docs/chart-concepts/labels-
         * and-string-formatting#html) to render the text.
         *
         * @type {Boolean}
         * @default false
         * @apioption title.useHTML
         */

        /**
         * The vertical alignment of the title. Can be one of `"top"`,
         * `"middle"` and `"bottom"`. When a value is given, the title behaves
         * as if [floating](#title.floating) were `true`.
         *
         * @validvalue ["top", "middle", "bottom"]
         * @type {String}
         * @sample {highcharts} highcharts/title/verticalalign/
         *         Chart title in bottom right corner
         * @sample {highstock} stock/chart/title-verticalalign/
         *         Chart title in bottom right corner
         * @since 2.1
         * @apioption title.verticalAlign
         */

        /**
         * The x position of the title relative to the alignment within
         * `chart.spacingLeft` and `chart.spacingRight`.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/title/align/
         *         Aligned to the plot area (x = 70px = margin left - spacing
         *         left)
         * @sample {highstock} stock/chart/title-align/
         *         Aligned to the plot area (x = 50px = margin left - spacing
         *         left)
         * @default 0
         * @since 2.0
         * @apioption title.x
         */

        /**
         * The y position of the title relative to the alignment within
         * [chart.spacingTop](#chart.spacingTop) and [chart.spacingBottom](
         * #chart.spacingBottom). By default it depends on the font size.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/title/y/
         *         Title inside the plot area
         * @sample {highstock} stock/chart/title-verticalalign/
         *         Chart title in bottom right corner
         * @since 2.0
         * @apioption title.y
         */

        /**
         * The title of the chart. To disable the title, set the `text` to
         * `null`.
         *
         * @type {String}
         * @sample {highcharts} highcharts/title/text/ Custom title
         * @sample {highstock} stock/chart/title-text/ Custom title
         * @default {highcharts|highmaps} Chart title
         * @default {highstock} null
         */
        text: 'Chart title',

        /**
         * The horizontal alignment of the title. Can be one of "left", "center"
         * and "right".
         *
         * @validvalue ["left", "center", "right"]
         * @type {String}
         * @sample {highcharts} highcharts/title/align/
         *         Aligned to the plot area (x = 70px = margin left - spacing
         *         left)
         * @sample {highstock} stock/chart/title-align/
         *         Aligned to the plot area (x = 50px = margin left - spacing
         *         left)
         * @default center
         * @since 2.0
         */
        align: 'center',

        /**
         * The margin between the title and the plot area, or if a subtitle
         * is present, the margin between the subtitle and the plot area.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/title/margin-50/
         *         A chart title margin of 50
         * @sample {highcharts} highcharts/title/margin-subtitle/
         *         The same margin applied with a subtitle
         * @sample {highstock} stock/chart/title-margin/
         *         A chart title margin of 50
         * @default 15
         * @since 2.1
         */
        margin: 15,

        /**
         * Adjustment made to the title width, normally to reserve space for
         * the exporting burger menu.
         *
         * @type {Number}
         * @sample highcharts/title/widthadjust/
         *         Wider menu, greater padding
         * @default -44
         * @since 4.2.5
         */
        widthAdjust: -44

    },

    /**
     * The chart's subtitle. This can be used both to display a subtitle below
     * the main title, and to display random text anywhere in the chart. The
     * subtitle can be updated after chart initialization through the
     * `Chart.setTitle` method.
     *
     * @sample {highmaps} maps/title/subtitle/ Subtitle options demonstrated
     */
    subtitle: {

        /**
         * When the subtitle is floating, the plot area will not move to make
         * space for it.
         *
         * @type {Boolean}
         * @sample {highcharts} highcharts/subtitle/floating/
         *         Floating title and subtitle
         * @sample {highstock} stock/chart/subtitle-footnote
         *         Footnote floating at bottom right of plot area
         * @default false
         * @since 2.1
         * @apioption subtitle.floating
         */

        /**
         * CSS styles for the title.
         *
         * In styled mode, the subtitle style is given in the
         * `.highcharts-subtitle` class.
         *
         * @type {CSSObject}
         * @sample {highcharts} highcharts/subtitle/style/
         *         Custom color and weight
         * @sample {highcharts} highcharts/css/titles/
         *         Styled mode
         * @sample {highstock} stock/chart/subtitle-style
         *         Custom color and weight
         * @sample {highstock} highcharts/css/titles/
         *         Styled mode
         * @sample {highmaps} highcharts/css/titles/
         *         Styled mode
         * @default { "color": "#666666" }
         * @apioption subtitle.style
         */

        /**
         * Whether to [use HTML](http://www.highcharts.com/docs/chart-concepts/labels-
         * and-string-formatting#html) to render the text.
         *
         * @type {Boolean}
         * @default false
         * @apioption subtitle.useHTML
         */

        /**
         * The vertical alignment of the title. Can be one of "top", "middle"
         * and "bottom". When a value is given, the title behaves as floating.
         *
         * @validvalue ["top", "middle", "bottom"]
         * @type {String}
         * @sample {highcharts} highcharts/subtitle/verticalalign/
         *         Footnote at the bottom right of plot area
         * @sample {highstock} stock/chart/subtitle-footnote
         *         Footnote at the bottom right of plot area
         * @default
         * @since 2.1
         * @apioption subtitle.verticalAlign
         */

        /**
         * The x position of the subtitle relative to the alignment within
         * `chart.spacingLeft` and `chart.spacingRight`.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/subtitle/align/
         *         Footnote at right of plot area
         * @sample {highstock} stock/chart/subtitle-footnote
         *         Footnote at the bottom right of plot area
         * @default 0
         * @since 2.0
         * @apioption subtitle.x
         */

        /**
         * The y position of the subtitle relative to the alignment within
         * `chart.spacingTop` and `chart.spacingBottom`. By default the subtitle
         * is laid out below the title unless the title is floating.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/subtitle/verticalalign/
         *         Footnote at the bottom right of plot area
         * @sample {highstock} stock/chart/subtitle-footnote
         *         Footnote at the bottom right of plot area
         * @default {highcharts}  null
         * @default {highstock}  null
         * @default {highmaps}
         * @since 2.0
         * @apioption subtitle.y
         */

        /**
         * The subtitle of the chart.
         *
         * @type {String}
         * @sample {highcharts|highstock} highcharts/subtitle/text/
         *         Custom subtitle
         * @sample {highcharts|highstock} highcharts/subtitle/text-formatted/
         *         Formatted and linked text.
         */
        text: '',

        /**
         * The horizontal alignment of the subtitle. Can be one of "left",
         *  "center" and "right".
         *
         * @validvalue ["left", "center", "right"]
         * @type {String}
         * @sample {highcharts} highcharts/subtitle/align/
         *         Footnote at right of plot area
         * @sample {highstock} stock/chart/subtitle-footnote
         *         Footnote at bottom right of plot area
         * @default center
         * @since 2.0
         */
        align: 'center',

        /**
         * Adjustment made to the subtitle width, normally to reserve space
         * for the exporting burger menu.
         *
         * @type {Number}
         * @see [title.widthAdjust](#title.widthAdjust)
         * @sample highcharts/title/widthadjust/
         *         Wider menu, greater padding
         * @default -44
         * @since 4.2.5
         */
        widthAdjust: -44
    },

    /**
     * The plotOptions is a wrapper object for config objects for each series
     * type. The config objects for each series can also be overridden for
     * each series item as given in the series array.
     *
     * Configuration options for the series are given in three levels. Options
     * for all series in a chart are given in the [plotOptions.series](
     * #plotOptions.series) object. Then options for all series of a specific
     * type are given in the plotOptions of that type, for example
     * `plotOptions.line`. Next, options for one single series are given in
     * [the series array](#series).
     *
     */
    plotOptions: {},

    /**
     * HTML labels that can be positioned anywhere in the chart area.
     *
     */
    labels: {

        /**
         * A HTML label that can be positioned anywhere in the chart area.
         *
         * @type {Array<Object>}
         * @apioption labels.items
         */

        /**
         * Inner HTML or text for the label.
         *
         * @type {String}
         * @apioption labels.items.html
         */

        /**
         * CSS styles for each label. To position the label, use left and top
         * like this:
         *
         * <pre>style: {
         *     left: '100px',
         *     top: '100px'
         * }</pre>
         *
         * @type {CSSObject}
         * @apioption labels.items.style
         */

        /**
         * Shared CSS styles for all labels.
         *
         * @type {CSSObject}
         * @default { "color": "#333333" }
         */
        style: {
            position: 'absolute',
            color: '#333333'
        }
    },

    /**
     * The legend is a box containing a symbol and name for each series
     * item or point item in the chart. Each series (or points in case
     * of pie charts) is represented by a symbol and its name in the legend.
     *
     * It is possible to override the symbol creator function and
     * create [custom legend symbols](http://jsfiddle.net/gh/get/library/pure/highcharts/highcharts/tree/master/samples/highcharts/studies/legend-
     * custom-symbol/).
     *
     * @productdesc {highmaps}
     * A Highmaps legend by default contains one legend item per series, but if
     * a `colorAxis` is defined, the axis will be displayed in the legend.
     * Either as a gradient, or as multiple legend items for `dataClasses`.
     */
    legend: {

        /**
         * The background color of the legend.
         *
         * @type {Color}
         * @see In styled mode, the legend background fill can be applied with
         * the `.highcharts-legend-box` class.
         * @sample {highcharts} highcharts/legend/backgroundcolor/
         *         Yellowish background
         * @sample {highstock} stock/legend/align/ Various legend options
         * @sample {highmaps} maps/legend/border-background/
         *         Border and background options
         * @apioption legend.backgroundColor
         */

        /**
         * The width of the drawn border around the legend.
         *
         * @type {Number}
         * @see In styled mode, the legend border stroke width can be applied
         * with the `.highcharts-legend-box` class.
         * @sample {highcharts} highcharts/legend/borderwidth/ 2px border width
         * @sample {highstock} stock/legend/align/ Various legend options
         * @sample {highmaps} maps/legend/border-background/
         *         Border and background options
         * @default 0
         * @apioption legend.borderWidth
         */

        /**
         * Enable or disable the legend.
         *
         * @type {Boolean}
         * @sample {highcharts} highcharts/legend/enabled-false/ Legend disabled
         * @sample {highstock} stock/legend/align/ Various legend options
         * @sample {highmaps} maps/legend/enabled-false/ Legend disabled
         * @default {highstock} false
         * @default {highmaps} true
         */
        enabled: true,

        /**
         * The horizontal alignment of the legend box within the chart area.
         * Valid values are `left`, `center` and `right`.
         *
         * In the case that the legend is aligned in a corner position, the
         * `layout` option will determine whether to place it above/below
         * or on the side of the plot area.
         *
         * @validvalue ["left", "center", "right"]
         * @type {String}
         * @sample {highcharts} highcharts/legend/align/
         *         Legend at the right of the chart
         * @sample {highstock} stock/legend/align/
         *         Various legend options
         * @sample {highmaps} maps/legend/alignment/
         *         Legend alignment
         * @since 2.0
         */
        align: 'center',

        /**
         * If the [layout](legend.layout) is `horizontal` and the legend items
         * span over two lines or more, whether to align the items into vertical
         * columns. Setting this to `false` makes room for more items, but will
         * look more messy.
         *
         * @since 6.1.0
         */
        alignColumns: true,

        /**
         * When the legend is floating, the plot area ignores it and is allowed
         * to be placed below it.
         *
         * @type {Boolean}
         * @sample {highcharts} highcharts/legend/floating-false/ False by default
         * @sample {highcharts} highcharts/legend/floating-true/ True
         * @sample {highmaps} maps/legend/alignment/ Floating legend
         * @default false
         * @since 2.1
         * @apioption legend.floating
         */

        /**
         * The layout of the legend items. Can be one of `horizontal` or
         * `vertical` or `proximate`. When `proximate`, the legend items will be
         * placed as close as possible to the graphs they're representing,
         * except in inverted charts or when the legend position doesn't allow
         * it.
         *
         * @validvalue ["horizontal", "vertical", "proximate"]
         * @type {String}
         * @sample {highcharts} highcharts/legend/layout-horizontal/
         *         Horizontal by default
         * @sample {highcharts} highcharts/legend/layout-vertical/
         *         Vertical
         * @sample highcharts/legend/layout-proximate
         *         Labels proximate to the data
         * @sample {highstock} stock/legend/layout-horizontal/
         *         Horizontal by default
         * @sample {highmaps} maps/legend/padding-itemmargin/
         *         Vertical with data classes
         * @sample {highmaps} maps/legend/layout-vertical/
         *         Vertical with color axis gradient
         * @default horizontal
         */
        layout: 'horizontal',

        /**
         * In a legend with horizontal layout, the itemDistance defines the
         * pixel distance between each item.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/legend/layout-horizontal/ 50px item distance
         * @sample {highstock} highcharts/legend/layout-horizontal/ 50px item distance
         * @default {highcharts} 20
         * @default {highstock} 20
         * @default {highmaps} 8
         * @since 3.0.3
         * @apioption legend.itemDistance
         */

        /**
         * The pixel bottom margin for each legend item.
         *
         * @type {Number}
         * @sample {highcharts|highstock} highcharts/legend/padding-itemmargin/
         *         Padding and item margins demonstrated
         * @sample {highmaps} maps/legend/padding-itemmargin/
         *         Padding and item margins demonstrated
         * @default 0
         * @since 2.2.0
         * @apioption legend.itemMarginBottom
         */

        /**
         * The pixel top margin for each legend item.
         *
         * @type {Number}
         * @sample {highcharts|highstock} highcharts/legend/padding-itemmargin/
         *         Padding and item margins demonstrated
         * @sample {highmaps} maps/legend/padding-itemmargin/
         *         Padding and item margins demonstrated
         * @default 0
         * @since 2.2.0
         * @apioption legend.itemMarginTop
         */

        /**
         * The width for each legend item. By default the items are laid out
         * successively. In a [horizontal layout](legend.layout), if the items
         * are laid out across two rows or more, they will be vertically aligned
         * depending on the [legend.alignColumns](legend.alignColumns) option.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/legend/itemwidth-default/
         *         Null by default
         * @sample {highcharts} highcharts/legend/itemwidth-80/
         *         80 for aligned legend items
         * @default null
         * @since 2.0
         * @apioption legend.itemWidth
         */

        /**
         * A [format string](
         * http://www.highcharts.com/docs/chart-concepts/labels-and-string-formatting)
         * for each legend label. Available variables relates to properties on
         * the series, or the point in case of pies.
         *
         * @type {String}
         * @default {name}
         * @since 1.3
         * @apioption legend.labelFormat
         */

        /**
         * Callback function to format each of the series' labels. The `this`
         * keyword refers to the series object, or the point object in case
         * of pie charts. By default the series or point name is printed.
         *
         * @productdesc {highmaps}
         *              In Highmaps the context can also be a data class in case
         *              of a `colorAxis`.
         *
         * @type    {Function}
         * @sample  {highcharts} highcharts/legend/labelformatter/ Add text
         * @sample  {highmaps} maps/legend/labelformatter/
         *          Data classes with label formatter
         * @context {Series|Point}
         */
        labelFormatter: function () {
            return this.name;
        },

        /**
         * Line height for the legend items. Deprecated as of 2.1\. Instead,
         * the line height for each item can be set using itemStyle.lineHeight,
         * and the padding between items using `itemMarginTop` and
         * `itemMarginBottom`.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/legend/lineheight/ Setting padding
         * @default 16
         * @since 2.0
         * @product highcharts
         * @apioption legend.lineHeight
         */

        /**
         * If the plot area sized is calculated automatically and the legend
         * is not floating, the legend margin is the space between the legend
         * and the axis labels or plot area.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/legend/margin-default/
         *         12 pixels by default
         * @sample {highcharts} highcharts/legend/margin-30/ 30 pixels
         * @default 12
         * @since 2.1
         * @apioption legend.margin
         */

        /**
         * Maximum pixel height for the legend. When the maximum height is
         * extended, navigation will show.
         *
         * @type {Number}
         * @default undefined
         * @since 2.3.0
         * @apioption legend.maxHeight
         */

        /**
         * The color of the drawn border around the legend.
         *
         * @type {Color}
         * @see In styled mode, the legend border stroke can be applied with
         * the `.highcharts-legend-box` class.
         * @sample {highcharts} highcharts/legend/bordercolor/ Brown border
         * @sample {highstock} stock/legend/align/ Various legend options
         * @sample {highmaps} maps/legend/border-background/
         *         Border and background options
         * @default #999999
         */
        borderColor: '#999999',

        /**
         * The border corner radius of the legend.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/legend/borderradius-default/ Square by default
         * @sample {highcharts} highcharts/legend/borderradius-round/ 5px rounded
         * @sample {highmaps} maps/legend/border-background/
         *         Border and background options
         * @default 0
         */
        borderRadius: 0,

        /**
         * Options for the paging or navigation appearing when the legend
         * is overflown. Navigation works well on screen, but not in static
         * exported images. One way of working around that is to [increase
         * the chart height in export](http://jsfiddle.net/gh/get/library/pure/highcharts/highcharts/tree/master/samples/highcharts/legend/navigation-
         * enabled-false/).
         *
         */
        navigation: {

            /**
             * How to animate the pages when navigating up or down. A value of
             * `true` applies the default navigation given in the
             * `chart.animation` option. Additional options can be given as an
             * object containing values for easing and duration.
             *
             * @type {Boolean|Object}
             * @sample {highcharts} highcharts/legend/navigation/
             *         Legend page navigation demonstrated
             * @sample {highstock} highcharts/legend/navigation/
             *         Legend page navigation demonstrated
             * @default true
             * @since 2.2.4
             * @apioption legend.navigation.animation
             */

            /**
             * The pixel size of the up and down arrows in the legend paging
             * navigation.
             *
             * @type {Number}
             * @sample {highcharts} highcharts/legend/navigation/
             *         Legend page navigation demonstrated
             * @sample {highstock} highcharts/legend/navigation/
             *         Legend page navigation demonstrated
             * @default 12
             * @since 2.2.4
             * @apioption legend.navigation.arrowSize
             */

            /**
             * Whether to enable the legend navigation. In most cases, disabling
             * the navigation results in an unwanted overflow.
             *
             * See also the [adapt chart to legend](
             * http://www.highcharts.com/plugin-registry/single/8/Adapt-Chart-To-Legend)
             * plugin for a solution to extend the chart height to make room for
             * the legend, optionally in exported charts only.
             *
             * @type {Boolean}
             * @default true
             * @since 4.2.4
             * @apioption legend.navigation.enabled
             */

            /**
             * Text styles for the legend page navigation.
             *
             * @type {CSSObject}
             * @see In styled mode, the navigation items are styled with the
             * `.highcharts-legend-navigation` class.
             * @sample {highcharts} highcharts/legend/navigation/
             *         Legend page navigation demonstrated
             * @sample {highstock} highcharts/legend/navigation/
             *         Legend page navigation demonstrated
             * @since 2.2.4
             * @apioption legend.navigation.style
             */

            
        },

        /**
         * The inner padding of the legend box.
         *
         * @type {Number}
         * @sample {highcharts|highstock} highcharts/legend/padding-itemmargin/
         *         Padding and item margins demonstrated
         * @sample {highmaps} maps/legend/padding-itemmargin/
         *         Padding and item margins demonstrated
         * @default 8
         * @since 2.2.0
         * @apioption legend.padding
         */

        /**
         * Whether to reverse the order of the legend items compared to the
         * order of the series or points as defined in the configuration object.
         *
         * @type {Boolean}
         * @see [yAxis.reversedStacks](#yAxis.reversedStacks),
         *      [series.legendIndex](#series.legendIndex)
         * @sample {highcharts} highcharts/legend/reversed/
         *         Stacked bar with reversed legend
         * @default false
         * @since 1.2.5
         * @apioption legend.reversed
         */

        /**
         * Whether to show the symbol on the right side of the text rather than
         * the left side. This is common in Arabic and Hebraic.
         *
         * @type {Boolean}
         * @sample {highcharts} highcharts/legend/rtl/ Symbol to the right
         * @default false
         * @since 2.2
         * @apioption legend.rtl
         */

        /**
         * CSS styles for the legend area. In the 1.x versions the position
         * of the legend area was determined by CSS. In 2.x, the position is
         * determined by properties like `align`, `verticalAlign`, `x` and `y`,
         *  but the styles are still parsed for backwards compatibility.
         *
         * @type {CSSObject}
         * @deprecated
         * @product highcharts highstock
         * @apioption legend.style
         */

        

        /**
         * Default styling for the checkbox next to a legend item when
         * `showCheckbox` is true.
         */
        itemCheckboxStyle: {
            position: 'absolute',
            width: '13px', // for IE precision
            height: '13px'
        },
        // itemWidth: undefined,

        /**
         * When this is true, the legend symbol width will be the same as
         * the symbol height, which in turn defaults to the font size of the
         * legend items.
         *
         * @type {Boolean}
         * @default true
         * @since 5.0.0
         */
        squareSymbol: true,

        /**
         * The pixel height of the symbol for series types that use a rectangle
         * in the legend. Defaults to the font size of legend items.
         *
         * @productdesc {highmaps}
         * In Highmaps, when the symbol is the gradient of a vertical color
         * axis, the height defaults to 200.
         *
         * @type {Number}
         * @sample {highmaps} maps/legend/layout-vertical-sized/
         *         Sized vertical gradient
         * @sample {highmaps} maps/legend/padding-itemmargin/
         *         No distance between data classes
         * @since 3.0.8
         * @apioption legend.symbolHeight
         */

        /**
         * The border radius of the symbol for series types that use a rectangle
         * in the legend. Defaults to half the `symbolHeight`.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/legend/symbolradius/ Round symbols
         * @sample {highstock} highcharts/legend/symbolradius/ Round symbols
         * @sample {highmaps} highcharts/legend/symbolradius/ Round symbols
         * @since 3.0.8
         * @apioption legend.symbolRadius
         */

        /**
         * The pixel width of the legend item symbol. When the `squareSymbol`
         * option is set, this defaults to the `symbolHeight`, otherwise 16.
         *
         * @productdesc {highmaps}
         * In Highmaps, when the symbol is the gradient of a horizontal color
         * axis, the width defaults to 200.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/legend/symbolwidth/
         *         Greater symbol width and padding
         * @sample {highmaps} maps/legend/padding-itemmargin/
         *         Padding and item margins demonstrated
         * @sample {highmaps} maps/legend/layout-vertical-sized/
         *         Sized vertical gradient
         * @apioption legend.symbolWidth
         */

        /**
         * Whether to [use HTML](http://www.highcharts.com/docs/chart-concepts/labels-
         * and-string-formatting#html) to render the legend item texts. Prior
         * to 4.1.7, when using HTML, [legend.navigation](#legend.navigation)
         * was disabled.
         *
         * @type {Boolean}
         * @default false
         * @apioption legend.useHTML
         */

        /**
         * The width of the legend box.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/legend/width/ Aligned to the plot area
         * @default null
         * @since 2.0
         * @apioption legend.width
         */

        /**
         * The pixel padding between the legend item symbol and the legend
         * item text.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/legend/symbolpadding/ Greater symbol width and padding
         * @default 5
         */
        symbolPadding: 5,

        /**
         * The vertical alignment of the legend box. Can be one of `top`,
         * `middle` or `bottom`. Vertical position can be further determined
         * by the `y` option.
         *
         * In the case that the legend is aligned in a corner position, the
         * `layout` option will determine whether to place it above/below
         * or on the side of the plot area.
         *
         * When the [layout](#legend.layout) option is `proximate`, the
         * `verticalAlign` option doesn't apply.
         *
         * @validvalue ["top", "middle", "bottom"]
         * @type {String}
         * @sample {highcharts} highcharts/legend/verticalalign/
         *         Legend 100px from the top of the chart
         * @sample {highstock} stock/legend/align/ Various legend options
         * @sample {highmaps} maps/legend/alignment/ Legend alignment
         * @default bottom
         * @since 2.0
         */
        verticalAlign: 'bottom',
        // width: undefined,

        /**
         * The x offset of the legend relative to its horizontal alignment
         * `align` within chart.spacingLeft and chart.spacingRight. Negative
         * x moves it to the left, positive x moves it to the right.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/legend/width/ Aligned to the plot area
         * @default 0
         * @since 2.0
         */
        x: 0,

        /**
         * The vertical offset of the legend relative to it's vertical alignment
         * `verticalAlign` within chart.spacingTop and chart.spacingBottom.
         *  Negative y moves it up, positive y moves it down.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/legend/verticalalign/ Legend 100px from the top of the chart
         * @sample {highstock} stock/legend/align/ Various legend options
         * @sample {highmaps} maps/legend/alignment/ Legend alignment
         * @default 0
         * @since 2.0
         */
        y: 0,

        /**
         * A title to be added on top of the legend.
         *
         * @sample {highcharts} highcharts/legend/title/ Legend title
         * @sample {highmaps} maps/legend/alignment/ Legend with title
         * @since 3.0
         */
        title: {
            /**
             * A text or HTML string for the title.
             *
             * @type {String}
             * @default null
             * @since 3.0
             * @apioption legend.title.text
             */

            
        }
    },


    /**
     * The loading options control the appearance of the loading screen
     * that covers the plot area on chart operations. This screen only
     * appears after an explicit call to `chart.showLoading()`. It is a
     * utility for developers to communicate to the end user that something
     * is going on, for example while retrieving new data via an XHR connection.
     * The "Loading..." text itself is not part of this configuration
     * object, but part of the `lang` object.
     *
     */
    loading: {

        /**
         * The duration in milliseconds of the fade out effect.
         *
         * @type {Number}
         * @sample highcharts/loading/hideduration/ Fade in and out over a second
         * @default 100
         * @since 1.2.0
         * @apioption loading.hideDuration
         */

        /**
         * The duration in milliseconds of the fade in effect.
         *
         * @type {Number}
         * @sample highcharts/loading/hideduration/ Fade in and out over a second
         * @default 100
         * @since 1.2.0
         * @apioption loading.showDuration
         */
        
    },


    /**
     * Options for the tooltip that appears when the user hovers over a
     * series or point.
     *
     */
    tooltip: {


        /**
         * The color of the tooltip border. When `null`, the border takes the
         * color of the corresponding series or point.
         *
         * @type {Color}
         * @sample {highcharts} highcharts/tooltip/bordercolor-default/
         *         Follow series by default
         * @sample {highcharts} highcharts/tooltip/bordercolor-black/
         *         Black border
         * @sample {highstock} stock/tooltip/general/
         *         Styled tooltip
         * @sample {highmaps} maps/tooltip/background-border/
         *         Background and border demo
         * @default null
         * @apioption tooltip.borderColor
         */

        /**
         * Since 4.1, the crosshair definitions are moved to the Axis object
         * in order for a better separation from the tooltip. See
         * [xAxis.crosshair](#xAxis.crosshair)<a>.</a>
         *
         * @type {Mixed}
         * @deprecated
         * @sample {highcharts} highcharts/tooltip/crosshairs-x/
         *         Enable a crosshair for the x value
         * @default true
         * @apioption tooltip.crosshairs
         */

        /**
         * Whether the tooltip should follow the mouse as it moves across
         * columns, pie slices and other point types with an extent. By default
         * it behaves this way for scatter, bubble and pie series by override
         * in the `plotOptions` for those series types.
         *
         * For touch moves to behave the same way, [followTouchMove](
         * #tooltip.followTouchMove) must be `true` also.
         *
         * @type {Boolean}
         * @default {highcharts} false
         * @default {highstock} false
         * @default {highmaps} true
         * @since 3.0
         * @apioption tooltip.followPointer
         */

        /**
         * Whether the tooltip should follow the finger as it moves on a touch
         * device. If this is `true` and [chart.panning](#chart.panning) is
         * set,`followTouchMove` will take over one-finger touches, so the user
         * needs to use two fingers for zooming and panning.
         *
         * @type {Boolean}
         * @default {highcharts} true
         * @default {highstock} true
         * @default {highmaps} false
         * @since 3.0.1
         * @apioption tooltip.followTouchMove
         */

        /**
         * Callback function to format the text of the tooltip from scratch.
         * Return `false` to disable tooltip for a specific point on series.
         *
         * A subset of HTML is supported. Unless `useHTML` is true, the HTML of
         * the tooltip is parsed and converted to SVG, therefore this isn't a
         * complete HTML renderer. The following tags are supported: `<b>`,
         * `<strong>`, `<i>`, `<em>`, `<br/>`, `<span>`. Spans can be styled
         * with a `style` attribute, but only text-related CSS that is shared
         * with SVG is handled.
         *
         * Since version 2.1 the tooltip can be shared between multiple series
         * through the `shared` option. The available data in the formatter
         * differ a bit depending on whether the tooltip is shared or not. In
         * a shared tooltip, all properties except `x`, which is common for
         * all points, are kept in an array, `this.points`.
         *
         * Available data are:
         *
         * <dl>
         *
         * <dt>this.percentage (not shared) / this.points[i].percentage (shared)
         * </dt>
         *
         * <dd>Stacked series and pies only. The point's percentage of the
         * total.
         * </dd>
         *
         * <dt>this.point (not shared) / this.points[i].point (shared)</dt>
         *
         * <dd>The point object. The point name, if defined, is available
         * through `this.point.name`.</dd>
         *
         * <dt>this.points</dt>
         *
         * <dd>In a shared tooltip, this is an array containing all other
         * properties for each point.</dd>
         *
         * <dt>this.series (not shared) / this.points[i].series (shared)</dt>
         *
         * <dd>The series object. The series name is available through
         * `this.series.name`.</dd>
         *
         * <dt>this.total (not shared) / this.points[i].total (shared)</dt>
         *
         * <dd>Stacked series only. The total value at this point's x value.
         * </dd>
         *
         * <dt>this.x</dt>
         *
         * <dd>The x value. This property is the same regardless of the tooltip
         * being shared or not.</dd>
         *
         * <dt>this.y (not shared) / this.points[i].y (shared)</dt>
         *
         * <dd>The y value.</dd>
         *
         * </dl>
         *
         * @type {Function}
         * @sample {highcharts} highcharts/tooltip/formatter-simple/
         *         Simple string formatting
         * @sample {highcharts} highcharts/tooltip/formatter-shared/
         *         Formatting with shared tooltip
         * @sample {highstock} stock/tooltip/formatter/
         *         Formatting with shared tooltip
         * @sample {highmaps} maps/tooltip/formatter/
         *         String formatting
         * @apioption tooltip.formatter
         */

        /**
         * The number of milliseconds to wait until the tooltip is hidden when
         * mouse out from a point or chart.
         *
         * @type {Number}
         * @default 500
         * @since 3.0
         * @apioption tooltip.hideDelay
         */

        /**
         * Whether to allow the tooltip to render outside the chart's SVG
         * element box. By default (`false`), the tooltip is rendered within the
         * chart's SVG element, which results in the tooltip being aligned
         * inside the chart area. For small charts, this may result in clipping
         * or overlapping. When `true`, a separate SVG element is created and
         * overlaid on the page, allowing the tooltip to be aligned inside the
         * page itself.
         *
         * @type {Boolean}
         * @sample highcharts/tooltip/outside
         *         Small charts with tooltips outside
         * @default false
         * @since 6.1.1
         * @apioption tooltip.outside
         */

        /**
         * A callback function for formatting the HTML output for a single point
         * in the tooltip. Like the `pointFormat` string, but with more
         * flexibility.
         *
         * @type {Function}
         * @context Point
         * @since 4.1.0
         * @apioption tooltip.pointFormatter
         */

        /**
         * A callback function to place the tooltip in a default position. The
         * callback receives three parameters: `labelWidth`, `labelHeight` and
         * `point`, where point contains values for `plotX` and `plotY` telling
         * where the reference point is in the plot area. Add `chart.plotLeft`
         * and `chart.plotTop` to get the full coordinates.
         *
         * The return should be an object containing x and y values, for example
         * `{ x: 100, y: 100 }`.
         *
         * @type {Function}
         * @sample {highcharts} highcharts/tooltip/positioner/
         *         A fixed tooltip position
         * @sample {highstock} stock/tooltip/positioner/
         *         A fixed tooltip position on top of the chart
         * @sample {highmaps} maps/tooltip/positioner/
         *         A fixed tooltip position
         * @since 2.2.4
         * @apioption tooltip.positioner
         */

        /**
         * The name of a symbol to use for the border around the tooltip.
         *
         * @type {String}
         * @default callout
         * @validvalue ["callout", "square"]
         * @since 4.0
         * @apioption tooltip.shape
         */

        /**
         * When the tooltip is shared, the entire plot area will capture mouse
         * movement or touch events. Tooltip texts for series types with ordered
         * data (not pie, scatter, flags etc) will be shown in a single bubble.
         * This is recommended for single series charts and for tablet/mobile
         * optimized charts.
         *
         * See also [tooltip.split](#tooltip.split), that is better suited for
         * charts with many series, especially line-type series. The
         * `tooltip.split` option takes precedence over `tooltip.shared`.
         *
         * @type {Boolean}
         * @sample {highcharts} highcharts/tooltip/shared-false/
         *         False by default
         * @sample {highcharts} highcharts/tooltip/shared-true/ True
         * @sample {highcharts} highcharts/tooltip/shared-x-crosshair/
         *         True with x axis crosshair
         * @sample {highcharts} highcharts/tooltip/shared-true-mixed-types/
         *         True with mixed series types
         * @default false
         * @since 2.1
         * @product highcharts highstock
         * @apioption tooltip.shared
         */

        /**
         * Split the tooltip into one label per series, with the header close
         * to the axis. This is recommended over [shared](#tooltip.shared)
         * tooltips for charts with multiple line series, generally making them
         * easier to read. This option takes precedence over `tooltip.shared`.
         *
         * @productdesc {highstock} In Highstock, tooltips are split by default
         * since v6.0.0. Stock charts typically contain multi-dimension points
         * and multiple panes, making split tooltips the preferred layout over
         * the previous `shared` tooltip.
         *
         * @type {Boolean}
         * @sample highcharts/tooltip/split/ Split tooltip
         * @default {highcharts} false
         * @default {highstock} true
         * @product highcharts highstock
         * @since 5.0.0
         * @apioption tooltip.split
         */

        /**
         * Use HTML to render the contents of the tooltip instead of SVG. Using
         * HTML allows advanced formatting like tables and images in the
         * tooltip. It is also recommended for rtl languages as it works around
         * rtl bugs in early Firefox.
         *
         * @type {Boolean}
         * @sample {highcharts|highstock} highcharts/tooltip/footerformat/
         *         A table for value alignment
         * @sample {highcharts|highstock} highcharts/tooltip/fullhtml/
         *         Full HTML tooltip
         * @sample {highmaps} maps/tooltip/usehtml/ Pure HTML tooltip
         * @default false
         * @since 2.2
         * @apioption tooltip.useHTML
         */

        /**
         * How many decimals to show in each series' y value. This is
         * overridable in each series' tooltip options object. The default is to
         * preserve all decimals.
         *
         * @type {Number}
         * @sample {highcharts|highstock} highcharts/tooltip/valuedecimals/
         *         Set decimals, prefix and suffix for the value
         * @sample {highmaps} maps/tooltip/valuedecimals/
         *         Set decimals, prefix and suffix for the value
         * @since 2.2
         * @apioption tooltip.valueDecimals
         */

        /**
         * A string to prepend to each series' y value. Overridable in each
         * series' tooltip options object.
         *
         * @type {String}
         * @sample {highcharts|highstock} highcharts/tooltip/valuedecimals/
         *         Set decimals, prefix and suffix for the value
         * @sample {highmaps} maps/tooltip/valuedecimals/
         *         Set decimals, prefix and suffix for the value
         * @since 2.2
         * @apioption tooltip.valuePrefix
         */

        /**
         * A string to append to each series' y value. Overridable in each
         * series' tooltip options object.
         *
         * @type {String}
         * @sample {highcharts|highstock} highcharts/tooltip/valuedecimals/
         *         Set decimals, prefix and suffix for the value
         * @sample {highmaps} maps/tooltip/valuedecimals/
         *         Set decimals, prefix and suffix for the value
         * @since 2.2
         * @apioption tooltip.valueSuffix
         */

        /**
         * The format for the date in the tooltip header if the X axis is a
         * datetime axis. The default is a best guess based on the smallest
         * distance between points in the chart.
         *
         * @type {String}
         * @sample {highcharts} highcharts/tooltip/xdateformat/ A different format
         * @product highcharts highstock
         * @apioption tooltip.xDateFormat
         */

        /**
         * Enable or disable the tooltip.
         *
         * @type {Boolean}
         * @sample {highcharts} highcharts/tooltip/enabled/ Disabled
         * @sample {highcharts}
         *         highcharts/plotoptions/series-point-events-mouseover/
         *         Disable tooltip and show values on chart instead
         * @default true
         */
        enabled: true,

        /**
         * Enable or disable animation of the tooltip.
         *
         * @type {Boolean}
         * @default true
         * @since 2.3.0
         */
        animation: svg,

        /**
         * The radius of the rounded border corners.
         *
         * @type {Number}
         * @sample {highcharts} highcharts/tooltip/bordercolor-default/
         *         5px by default
         * @sample {highcharts} highcharts/tooltip/borderradius-0/
         *         Square borders
         * @sample {highmaps} maps/tooltip/background-border/
         *         Background and border demo
         * @default 3
         */
        borderRadius: 3,

        /**
         * For series on a datetime axes, the date format in the tooltip's
         * header will by default be guessed based on the closest data points.
         * This member gives the default string representations used for
         * each unit. For an overview of the replacement codes, see
         * [dateFormat](/class-reference/Highcharts#dateFormat).
         *
         * Defaults to:
         *
         * <pre>{
         *     millisecond:"%A, %b %e, %H:%M:%S.%L",
         *     second:"%A, %b %e, %H:%M:%S",
         *     minute:"%A, %b %e, %H:%M",
         *     hour:"%A, %b %e, %H:%M",
         *     day:"%A, %b %e, %Y",
         *     week:"Week from %A, %b %e, %Y",
         *     month:"%B %Y",
         *     year:"%Y"
         * }</pre>
         *
         * @type {Object}
         * @see [xAxis.dateTimeLabelFormats](#xAxis.dateTimeLabelFormats)
         * @product highcharts highstock
         */
        dateTimeLabelFormats: {
            millisecond: '%A, %b %e, %H:%M:%S.%L',
            second: '%A, %b %e, %H:%M:%S',
            minute: '%A, %b %e, %H:%M',
            hour: '%A, %b %e, %H:%M',
            day: '%A, %b %e, %Y',
            week: 'Week from %A, %b %e, %Y',
            month: '%B %Y',
            year: '%Y'
        },

        /**
         * A string to append to the tooltip format.
         *
         * @sample {highcharts} highcharts/tooltip/footerformat/
         *         A table for value alignment
         * @sample {highmaps} maps/tooltip/format/ Format demo
         * @since 2.2
         */
        footerFormat: '',

        /**
         * Padding inside the tooltip, in pixels.
         *
         * @type {Number}
         * @default 8
         * @since 5.0.0
         */
        padding: 8,

        /**
         * Proximity snap for graphs or single points. It defaults to 10 for
         * mouse-powered devices and 25 for touch devices.
         *
         * Note that in most cases the whole plot area captures the mouse
         * movement, and in these cases `tooltip.snap` doesn't make sense. This
         * applies when [stickyTracking](#plotOptions.series.stickyTracking)
         * is `true` (default) and when the tooltip is [shared](#tooltip.shared)
         * or [split](#tooltip.split).
         *
         * @type {Number}
         * @sample {highcharts} highcharts/tooltip/bordercolor-default/
         *         10 px by default
         * @sample {highcharts} highcharts/tooltip/snap-50/ 50 px on graph
         * @default 10/25
         * @since 1.2.0
         * @product highcharts highstock
         */
        snap: isTouchDevice ? 25 : 10,
        
        headerFormat: '<span class="highcharts-header">{point.key}</span><br/>',
        pointFormat: '<span class="highcharts-color-{point.colorIndex}">' +
            '\u25CF</span> {series.name}: <span class="highcharts-strong">' +
            '{point.y}</span><br/>'
        
    },


    /**
     * Highchart by default puts a credits label in the lower right corner
     * of the chart. This can be changed using these options.
     */
    credits: {

        /**
         * Whether to show the credits text.
         *
         * @type {Boolean}
         * @sample {highcharts} highcharts/credits/enabled-false/ Credits disabled
         * @sample {highstock} stock/credits/enabled/ Credits disabled
         * @sample {highmaps} maps/credits/enabled-false/ Credits disabled
         * @default true
         */
        enabled: true,

        /**
         * The URL for the credits label.
         *
         * @type {String}
         * @sample {highcharts} highcharts/credits/href/ Custom URL and text
         * @sample {highmaps} maps/credits/customized/ Custom URL and text
         * @default {highcharts} http://www.highcharts.com
         * @default {highstock} "http://www.highcharts.com"
         * @default {highmaps} http://www.highcharts.com
         */
        href: 'http://www.highcharts.com',

        /**
         * Position configuration for the credits label.
         *
         * @type {Object}
         * @sample {highcharts} highcharts/credits/position-left/ Left aligned
         * @sample {highcharts} highcharts/credits/position-left/ Left aligned
         * @sample {highmaps} maps/credits/customized/ Left aligned
         * @sample {highmaps} maps/credits/customized/ Left aligned
         * @since 2.1
         */
        position: {

            /**
             * Horizontal alignment of the credits.
             *
             * @validvalue ["left", "center", "right"]
             * @type {String}
             * @default right
             */
            align: 'right',

            /**
             * Horizontal pixel offset of the credits.
             *
             * @type {Number}
             * @default -10
             */
            x: -10,

            /**
             * Vertical alignment of the credits.
             *
             * @validvalue ["top", "middle", "bottom"]
             * @type {String}
             * @default bottom
             */
            verticalAlign: 'bottom',

            /**
             * Vertical pixel offset of the credits.
             *
             * @type {Number}
             * @default -5
             */
            y: -5
        },
        

        /**
         * The text for the credits label.
         *
         * @productdesc {highmaps}
         * If a map is loaded as GeoJSON, the text defaults to
         * `Highcharts @ {map-credits}`. Otherwise, it defaults to
         * `Highcharts.com`.
         *
         * @type {String}
         * @sample {highcharts} highcharts/credits/href/ Custom URL and text
         * @sample {highmaps} maps/credits/customized/ Custom URL and text
         * @default {highcharts|highstock} Highcharts.com
         */
        text: 'Highcharts.com'
    }
};

/**
 * Merge the default options with custom options and return the new options
 * structure. Commonly used for defining reusable templates.
 *
 * @function #setOptions
 * @memberof Highcharts
 * @sample highcharts/global/useutc-false Setting a global option
 * @sample highcharts/members/setoptions Applying a global theme
 * @param {Object} options The new custom chart options.
 * @returns {Object} Updated options.
 */
H.setOptions = function (options) {

    // Copy in the default options
    H.defaultOptions = merge(true, H.defaultOptions, options);

    // Update the time object
    H.time.update(
        merge(H.defaultOptions.global, H.defaultOptions.time),
        false
    );

    return H.defaultOptions;
};

/**
 * Get the updated default options. Until 3.0.7, merely exposing defaultOptions
 * for outside modules wasn't enough because the setOptions method created a new
 * object.
 */
H.getOptions = function () {
    return H.defaultOptions;
};


// Series defaults
H.defaultPlotOptions = H.defaultOptions.plotOptions;


// Time utilities
H.time = new H.Time(merge(H.defaultOptions.global, H.defaultOptions.time));

/**
 * Formats a JavaScript date timestamp (milliseconds since Jan 1st 1970) into a
 * human readable date string. The format is a subset of the formats for PHP's
 * [strftime]{@link
 * http://www.php.net/manual/en/function.strftime.php} function. Additional
 * formats can be given in the {@link Highcharts.dateFormats} hook.
 *
 * Since v6.0.5, all internal dates are formatted through the
 * [Chart.time](Chart#time) instance to respect chart-level time settings. The
 * `Highcharts.dateFormat` function only reflects global time settings set with
 * `setOptions`.
 *
 * @function #dateFormat
 * @memberof Highcharts
 * @param {String} format - The desired format where various time
 *        representations are prefixed with %.
 * @param {Number} timestamp - The JavaScript timestamp.
 * @param {Boolean} [capitalize=false] - Upper case first letter in the return.
 * @returns {String} The formatted date.
 */
H.dateFormat = function (format, timestamp, capitalize) {
    return H.time.dateFormat(format, timestamp, capitalize);
};

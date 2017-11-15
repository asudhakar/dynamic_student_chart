var chart;
var legend;

var chartData = [{
    country: "English",
    value: 10},
{
    country: "Tamil",
    value: 50},
{
    country: "Maths",
    value: 10},
{
    country: "Physics",
    value: 10},
{
    country: "Che",
    value: 10},
{
    country: "Computer",
    value: 10}];

AmCharts.ready(function() {
    // PIE CHART
    chart = new AmCharts.AmPieChart();
    chart.dataProvider = chartData;
    chart.titleField = "country";
    chart.valueField = "value";
    chart.outlineColor = "";
    chart.outlineAlpha = 0.8;
    chart.outlineThickness = 2;
    // this makes the chart 3D
    chart.depth3D = 20;
    chart.angle = 30;

    // WRITE
    chart.write("chartdiv");
});
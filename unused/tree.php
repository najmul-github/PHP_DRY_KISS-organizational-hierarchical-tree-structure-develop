<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Organizational Hierarchy</title>
  <script src="https://d3js.org/d3.v7.min.js"></script>
</head>
<body>
    <div id="organogram">
        <!-- The hierarchy tree will be generated and inserted here. -->
    </div>

    <script>
        d3.json('employee.php', function(data) {
            var margin = {top: 20, right: 90, bottom: 30, left: 90};
            var width = 960 - margin.left - margin.right;
            var height = 500 - margin.top - margin.bottom;
            
            var root = d3.hierarchy(data);
            
            var tree = d3.tree().size([height, width]);
            
            var svg = d3.select("#organogram")
                .append("svg")
                .attr("width", width + margin.left + margin.right)
                .attr("height", height + margin.top + margin.bottom)
                .append("g")
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
            
            var nodes = tree(root);
            
            // Rest of the D3.js code to create the tree
        });
    </script>
</body>
</html>

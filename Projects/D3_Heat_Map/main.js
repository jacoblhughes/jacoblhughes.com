


    d3.json("https://raw.githubusercontent.com/freeCodeCamp/ProjectReferenceData/master/global-temperature.json").then(function (data) {

        const dataset = data.monthlyVariance;

        const w = 800;
        const h = 500;
        const padding = 40;

        const variance = [-6.976, -5.4505, -3.925, -2.3995, -0.874, 0.6515, 2.177, 3.7025, 5.228]

        const anchor = d3.select('#graph')
            .append('svg')
            .attr('width', w)
            .attr('height', h)

        const xScale = d3.scaleLinear()
            .domain([d3.min(dataset, (d) => d.year), 2015])
            .range([padding, w-padding]);

        const yScale = d3.scaleLinear()
            .domain([0, d3.max(dataset, (d) => d.month)])
            .range([h - padding, padding]);

        const xAxis = d3.axisBottom(xScale)
            .tickFormat(d3.format("d"))
            .ticks(20);

        const yAxis = d3.axisLeft(yScale);

        anchor.selectAll('rect')
            .data(dataset)
            .enter()
            .append("rect")
            .attr("x", (d) => xScale(d.year))
            .attr("y", (d) => yScale(d.month))
            .attr('width', 20)
            .attr('height', 35)
            .attr('class', 'bar')
            .attr('fill', function (d) {

                if ((d.variance) >= variance[0] && (d.variance) < variance[1]) {
                    return '#033f70'
                } else if ((d.variance) >= variance[1] && (d.variance) < variance[2]) {
                    return '#92dce5'
                } else if ((d.variance) >= variance[2] && (d.variance) < variance[3]) {
                    return '#c5f4f7'
                } else if ((d.variance) >= variance[3] && (d.variance) < variance[4]) {
                    return '#dbefff'
                } else if ((d.variance) >= variance[4] && (d.variance) < variance[5]) {
                    return '#f4e2ff'
                } else if ((d.variance) >= variance[5] && (d.variance) < variance[6]) {
                    return '#f694c1'
                } else if ((d.variance) >= variance[6] && (d.variance) < variance[7]) {
                    return '#ed7daf'
                } else if ((d.variance) >= variance[7] && (d.variance) <= variance[8]) {
                    return '#ff3852'
                }
            })
            .append('title')
            .text((d) => 'Variance: ' + d.variance + ', Month: ' + d.month + ' , Year: ' + d.year);


        anchor.append("g")
            .attr("transform", "translate(" + (0) + "," + (h - padding) + ")")
            .call(xAxis);

        anchor.append('g')
            .attr("transform", "translate(" + (padding) + ", " + (0) + ")")
            .call(yAxis)
            .append("text")
            .attr("class", "y-axis");

        var legend = anchor.selectAll(".legend")
            .data([-6.976, -5.4505, -3.925, -2.3995, -0.874, 0.6515, 2.177, 3.7025])
            .enter().append("g")
            .attr("class", "legend")
            .attr("id", "legend")
            .attr("transform", function (d, i) {
                return "translate(" + (padding * 13.5) + "," + (h - 10) + ")";
            });

        legend.append("rect")
            .attr("x", (i) => 60 * i)
            .attr("width", 10)
            .attr("height", 10)
            .attr('fill', function (d) {
                if (d == "#2364aa") {
                    return '#ea7317'
                } else {
                    return '#2364aa'
                }
            })
            .attr('fill', function (d) {

                if ((d) >= variance[0] && (d) < variance[1]) {
                    return '#033f70'
                } else if ((d) >= variance[1] && (d) < variance[2]) {
                    return '#92dce5'
                } else if ((d) >= variance[2] && (d) < variance[3]) {
                    return '#c5f4f7'
                } else if ((d) >= variance[3] && (d) < variance[4]) {
                    return '#dbefff'
                } else if ((d) >= variance[4] && (d) < variance[5]) {
                    return '#f4e2ff'
                } else if ((d) >= variance[5] && (d) < variance[6]) {
                    return '#f694c1'
                } else if ((d) >= variance[6] && (d) < variance[7]) {
                    return '#ed7daf'
                } else if ((d) >= variance[7] && (d) <= variance[8]) {
                    return '#ff3852'
                }
            })
            .attr('class', 'legend_squares')

        legend.append("text")
            .attr("x", (i) => 60 * i)
            .attr("y", 10)
            .attr("dy", "")
            .attr('font-size', '8px')
            .style("text-anchor", "end")
            .text(function (d, i) {
                if (d == variance[7]) {
                    return d + ' thru ' + (variance[i + 1])
                }
                return d + ' to ' + (variance[i + 1]);
            });

        anchor.append("text")
            .attr('id', 'title')
            .attr("x", (w / 2))
            .attr("y", (padding/1.3))
            .attr("text-anchor", "middle")
            .style("font-size", "30px")
            .text("Temperature Variations: Base Temperature 8.66℃");




    });



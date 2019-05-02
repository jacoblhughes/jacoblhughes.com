

    d3.json("https://raw.githubusercontent.com/freeCodeCamp/ProjectReferenceData/master/cyclist-data.json").then(function (data) {
        const dataset = data;

        const w = 800;
        const h = 600;
        const padding = 50;

        const anchor = d3.select('#graph')
            .append('svg')
            .attr('width', w)
            .attr('height', h)

        const xScale = d3.scaleLinear()
            .domain([d3.min(dataset, (d) => d.Year) - 1, d3.max(dataset, (d) => d.Year) + 1])
            .range([padding, w - padding]);

        const yScale = d3.scaleLinear()
            .domain([2200, 2400])
            .range([h - padding, padding]);

        const xAxis = d3.axisBottom(xScale)
            .tickFormat(d3.format("d"));

        const yAxis = d3.axisLeft(yScale)
            .tickFormat(function (d) {
                let time = '';
                let minutes = Math.floor(d / 60);
                let seconds = d - (minutes * 60);
                if (seconds == 0) {
                    seconds = '00'
                }
                time = minutes + ':' + seconds;
                return time;
            });

        anchor.selectAll('circle')
            .data(dataset)
            .enter()
            .append("circle")
            .attr('class', 'dot')
            .attr("cx", (d) => xScale(d.Year))
            .attr("cy", (d) => yScale(d.Seconds))
            .attr('r', 6)
            .attr('fill', function (d, i) {
                if (d.Doping !== "") {
                    return '#2364aa'
                } else {
                    return '#ea7317'
                }
            })
            .append('title')
            .text((d) => 'Year: ' + d.Year + ', Allegation: ' + d.Doping + ', Name: ' + d.Name)
            .attr("data-legend", function (d) {
                return d.Year
            })

        anchor.append("g")
            .attr("transform", "translate(0," + (h - padding) + ")")
            .call(xAxis)
            .attr('id', 'x-axis');

        anchor.append('g')
            .attr("transform", "translate(" + (padding) + ", " + (0) + ")")
            .call(yAxis)
            .attr('id', 'y-axis');

        var legend = anchor.selectAll(".legend")
            .data(['#ea7317', '#2364aa'])
            .enter().append("g")
            .attr("class", "legend")
            .attr("id", "legend")
            .attr("transform", function (d, i) {
                return "translate(0," + (h / 2 - i * 20) + ")";
            });

        legend.append("rect")
            .attr("x", w - 18)
            .attr("width", 18)
            .attr("height", 18)
            .attr('fill', function (d) {
                if (d == "#2364aa") {
                    return '#ea7317'
                } else {
                    return '#2364aa'
                }
            })

        legend.append("text")
            .attr("x", w - 24)
            .attr("y", 9)
            .attr("dy", ".35em")
            .style("text-anchor", "end")
            .text(function (d) {
                if (d == "#ea7317") return "Riders with doping allegations";
                else {
                    return "No doping allegations";
                };



            });

        anchor.append("text")
            .attr('id', 'title')
            .attr("x", (w / 2))
            .attr("y", (padding))
            .attr("text-anchor", "middle")
            .style("font-size", "30px")
            .text("Doping Allegations");
    });


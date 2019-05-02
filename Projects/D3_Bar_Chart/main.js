/*
User Story #1: My chart should have a title with a corresponding id="title".
User Story #2: My chart should have a g element x-axis with a corresponding id="x-axis".
User Story #3: My chart should have a g element y-axis with a corresponding id="y-axis".
User Story #4: Both axes should contain multiple tick labels, each with the corresponding class="tick".
User Story #5: My chart should have a rect element for each data point with a corresponding class="bar" displaying the data.
User Story #6: Each bar should have the properties data-date and data-gdp containing date and GDP values.
User Story #7: The bar elements' data-date properties should match the order of the provided data.
User Story #8: The bar elements' data-gdp properties should match the order of the provided data.
User Story #9: Each bar element's height should accurately represent the data's corresponding GDP.
User Story #10: The data-date attribute and its corresponding bar element should align with the corresponding value on the x-axis.
User Story #11: The data-gdp attribute and its corresponding bar element should align with the corresponding value on the y-axis.
User Story #12: I can mouse over an area and see a tooltip with a corresponding id="tooltip" which displays more information about the area.
User Story #13: My tooltip should have a data-date property that corresponds to the data-date of the active area.
*/


    const lightBlue = '#59a5d8';
    const mainBlue = '#2c5aa0';
    const tan = '#a9927d';
    const grey = '#e3dbdb';
    const black = '#0a0908';

    d3.json("https://raw.githubusercontent.com/freeCodeCamp/ProjectReferenceData/master/GDP-data.json").then(function (data) {

        const dataset = data.data;

        dataset.forEach(function (element) {
            element[0] = element[0].split('-').join('');
            let sum = '';
            let sum2 = 0;
            sum += element[0].slice(0, 4);
            sum2 += Number(element[0].slice(4, 6)) - Number(element[0].slice(6, 8));
            switch (sum2) {
                case 0:
                    sum2 = ' Q1';
                    break;
                case 3:
                    sum2 = ' Q2';
                    break;
                case 6:
                    sum2 = ' Q3';
                    break;
                case 9:
                    sum2 = ' Q4';
                    break;
            }
            element[0] = sum + sum2;
        });

        const w = 850;
        const h = 500;
        const barWidth = 3
        const padding = {top:80, right:40, bottom:40,left:40,standard:40};

        const anchor = d3.select('#graph')
            .append('svg')
            .attr('id', 'svg')
            .attr('width', w)
            .attr('height', h);

        const xScale = d3.scaleLinear()
            .domain([d3.min(dataset, (d) => Number(d[0].slice(0, 4))), d3.max(dataset, (d) => Number(d[0].slice(0, 4)) + .75)])
            .range([padding.standard, w - padding.standard]);

        const yScale = d3.scaleLinear()
            .domain([0, d3.max(dataset, (d) => d[1]) + 2000])
            .range([h - padding.top, padding.standard]);

        const xAxis = d3.axisBottom(xScale)
            .tickFormat(d3.format("d"));

        const yAxis = d3.axisLeft(yScale);

        anchor.selectAll('rect')
            .data(dataset)
            .enter()
            .append("rect")
            .attr("x", (d) => xScale(Number(d[0].slice(0, 4)) + Number((d[0].slice(6, 7) - 1) * .25)))
            .attr("y", (d) => yScale(d[1]))
            .attr("width", barWidth)
            .attr("height", (d) => d[1] / 52.75)
            .attr('fill', function (d, i) {
                switch (String(d[0].slice(5))) {
                    case 'Q1':
                        return black;
                        break;
                    case 'Q2':
                        return 'grey';
                        break;
                    case 'Q3':
                        return black;
                        break;
                    case 'Q4':
                        return 'grey';
                        break;
                }
            })
            .attr('class', 'bar')
            .append('title')
            .text((d) => 'Date: ' + d[0].substring(0, 4) + ' ' + d[0].substring(5) + ', GDP: ' + d[1])
            .attr('class', 'tooltip')


        anchor.append("g")
            .attr("transform", "translate(" + (0) + "," + (h - padding.top) + ")")
            .call(xAxis)
            .attr('id', 'x-axis')

        anchor.append('g')
            .attr("transform", "translate(" + (padding.standard) + ", " + (0) + ")")
            .call(yAxis)
            .attr('id', 'y-axis')

        anchor.append("text")
            .attr('id','title')
            .attr("x", (w / 2))
            .attr("y", (padding.top/2) )
            .attr("text-anchor", "middle")
            .style("font-size", "30px")
            .text("United States GDP");
    });


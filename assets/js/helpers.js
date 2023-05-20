const fetchData = (...urls) => {
    const promises = urls.map(url => fetch(url).then(response => response.json()))
    return Promise.all(promises)
}

const getDataColors = opacity => {
    const colors = ['#7448c2', '#21c0d7', '#d99e2b', '#cd3a81', '#9c99cc', '#e14eca', '#037bfc', '#ff0000', '#d6ff00', '#0038ff']
    return colors.map(color => opacity ? `${color + opacity}` : color)
}

const getLibrosByYear = (libros, years) => {
    const librosByYear = years.map(yearsRange => {
        const [from, to] = yearsRange.split('-')
        return libros.filter(eachLibro => eachLibro.anio >= from && eachLibro.anio <= to).length
    })
    return librosByYear
}

const updateChartData = (chartId, data, label) => {
    const chart = Chart.getChart(chartId)
    chart.data.datasets[0].data = data
    chart.data.datasets[0].label = label
    chart.update()
}
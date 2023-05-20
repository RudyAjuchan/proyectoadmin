var id_categoria = document.getElementById("select_categorias").value;
var g1 = new Chart('porCategoria', {type: 'doughnut'});
var g2 = new Chart('porPaginas', {type: 'radar'});
var g3 = new Chart('porYear', {type: 'line'});
var g4 = new Chart('porAutor', {type: 'bar'});
var g5 = new Chart('porEditorial', {type: 'polarArea'});
var g6 = new Chart('porPais', {type: 'bar'});

const printCharts = () =>{
    fetchData('http://localhost:8070/proyectoadmin/GraficasController/libros', 'http://localhost:8070/proyectoadmin/GraficasController/librosPorCategoria/'+id_categoria)
    .then(([allLibros, allCategoriasLibros]) => {
        renderCategoriasChart(allLibros)
        renderPaginasChart(allCategoriasLibros)
        renderYearsChar(allLibros)
        renderAutor(allLibros)
        renderEditorial(allLibros)
        renderPais(allLibros)
    });
    
}

const renderCategoriasChart = libros =>{

    const uniqueCategorias = [... new Set(libros.map(libros => libros.nombrecategoria))];

    const data = {
        labels: uniqueCategorias,
        datasets: [{
            data: uniqueCategorias.map(currentModel => libros.filter(libros => libros.nombrecategoria === currentModel).length),
            borderColor: getDataColors(),
            backgroundColor: getDataColors(50)
        }]
    }

    const options ={
        plugins: {
            legend: {position: 'left'}
        }
    }

    g1.data = data;
    g1.options = options;
    g1.update();
}


const renderPaginasChart = libros =>{
    const data = {
        labels: libros.map(libros => libros.titulo),
        datasets: [{
            label: "x",
            data: libros.map(libros => libros.no_paginas),
            borderColor: getDataColors()[0],
            backgroundColor: getDataColors(50)[0]
        }]
    }

    const options = {
        plugins: {
            legend: {display: false}
        },
        /* scales: {
            r: {
                ticks: {display: false}
            }
        } */
    }
    g2.data = data;
    g2.options = options;
    g2.update();
}


const renderYearsChar = libros => {
    const years = ['1998-2000', '2001-2003', '2004-2006', '2007-2009', '2010-2012', '2013-2015', '2016-2018', '2019-2021', '2022-2024'];
    /* const uniqueYears = [... new Set(libros.map(libros => libros.anio))]; */
    const data = {
        labels: years,
        datasets: [{
            /* data: uniqueYears.map(currentModel => libros.filter(libros => libros.anio === currentModel).length), */
            data: getLibrosByYear(libros, years),
            tension: .5,
            borderColor: getDataColors()[3],
            backgroundColor: getDataColors(50)[3],
            fill: true,
            pointBorderWidth: 5
        }]
    }

    const options = {
        plugins: {
            legend: {display: false}
        },
    }
    g3.data = data;
    g3.options = options;
    g3.update();
}

const renderAutor = libros => {

    const uniqueAutor = [... new Set(libros.map(libros => libros.nombreautor))];

    const data = {
        labels: uniqueAutor,
        datasets:[{
            label: "ñalskdf x",
            data: uniqueAutor.map(currentModel => libros.filter(libros => libros.nombreautor === currentModel).length),
            borderColor: getDataColors(),
            backgroundColor: getDataColors(50)
        }]
    }

    const options = {
        plugins: {
            legend: {display: false}
        },
    }

    g4.data = data;
    g4.options = options;
    g4.update();
}

const renderEditorial = libros => {

    const uniqueEditorial = [... new Set(libros.map(libros => libros.nombreeditorial))];

    const data = {
        labels: uniqueEditorial,
        datasets:[{
            label: "ñalskdf x",
            data: uniqueEditorial.map(currentModel => libros.filter(libros => libros.nombreeditorial === currentModel).length),
            borderColor: getDataColors(),
            backgroundColor: getDataColors(50)
        }]
    }

    g5.data = data;
    g5.update();
}

const renderPais = libros => {

    const uniqueLibro = [... new Set(libros.map(libros => libros.nombrepais))];

    const data = {
        labels: uniqueLibro,
        datasets:[{
            label: "ñalskdf x",
            data: uniqueLibro.map(currentModel => libros.filter(libros => libros.nombrepais === currentModel).length),
            borderColor: getDataColors(),
            backgroundColor: getDataColors(50)
        }]
    }

    const options = {
        plugins: {
            legend: {display: false}
        },
    }

    g6.data = data;
    g6.options = options;
    g6.update();
}

const actualizarGraficas = () =>{
    printCharts();
}

printCharts();
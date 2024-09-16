fetch("http://localhost:8000/v1/vagas")
    .then((res) => res.json())
    .then((data) => console.log(data));

// fetch("http://localhost:8000/v1/vagas", {
//     method: "POST",
//     body: {
//         empresa: "Umbrella Corporation",
//         titulo: "Professor",
//         descricao:
//             "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt cumque perferendis cum sint autem explicabo, libero at magni. Minima minus quae eligendi praesentium labore ut? Pariatur doloribus placeat sequi eos illo excepturi rem beatae. Delectus, culpa nulla? Autem a porro dolorum sunt delectus officiis, minima dolore harum nihil. Quo, quos!",
//         localizacao: "B",
//         nivel: 4,
//     },
// })
// .then((res) => res.json())
// .then((data) => console.log(data));
// .then((res) => console.log(res));

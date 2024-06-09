const drinks = [
	{
		title: "Ceviche Mix",
		description:
			"Disfruta la frescura y sabor que caracteriza a nuestro ceviche",
		url:
			"/imagen/6.jpeg",
		tags: ["Todo","Comida"]
	},
	{
		title: "Yakisoba",
		description:
			"Llena tu semana de sabor con nuestros Yakisobas",
		url:
			"/imagen/42.jpeg",
		tags: ["Todo", "Comida"]
	},
	{
		title: "Tonkotsu Ramen",
		description:
			"Disfruta de un rico ramen  base de caldo de cerdo",
		url:
			"/imagen/29.jpeg",
		tags: ["Todo","Comida"]
	},
	{
		title: "Tonkatsu",
		description:
			"Que no te falte tu Tonkatsu esta semana",
		url:
			"/imagen/25.jpeg",
		tags: ["Todo","Comida"]
	},
	{
		title: "Kyusu",
		description:
			"Nuestros té helados o calientes en su mejor presentacion ",
		url:
			"/imagen/48.jpeg",
		tags: ["Todo", "Bebida"]
	},
	{
		title: "Samba Caipiriña",
		description:
			"Ven y disfruta de nuestra cocteleria",
		url:
			"/imagen/49.jpeg",
		tags: ["Todo","Bebida"]
	},
	{
		title: "Gaseosa de jengibre",
		description:
			"Nuestras bebidas son perfectas para acompañar tu mesa",
		url:
			"/imagen/53.jpeg",
		tags: ["Todo","Bebida"]
	},
	{
		title: "Sopa Miso",
		description:
			"Nuestras deliciosa sopas para tu dia a dia",
		url:
			"/imagen/47.jpeg",
		tags: ["Todo", "Comida"]
	},
	{
		title: "Camarones",
		description:
			"Ven y prueba nuestros camarones",
		url:
			"/imagen/42.jpeg",
		tags: ["Todo","Comida"]
	},
	{
		title: "Cerdo Agridulce",
		description:
			"Sabores,texturas y colores combinados para ti",
		url:
			"/imagen/38.jpeg",
		tags: ["Todo", "Comida"]
	},
	{
		title: "Philadelpia",
		description:
			"Dia perfecto para disfrutar de nuestros rolls",
		url:
			"/imagen/28.jpeg",
		tags: ["Todo", "Comida"]
	},
	{
		title: "Midori",
		description:
			"Majestuosidad en cada sorbo",
		url:
			"/imagen/22.jpeg",
		tags: ["Todo", "Bebida"]
	},
	{
		title: "Vino blanco",
		description:
			"Vinos Bolivianos una experiencia de altura para tus sentidos",
		url:
			"/imagen/20.jpeg",
		tags: ["Todo", "Bebida"]
	},
	{
		title: "Karaage",
		description:
			"Ven y disfruta con este plato estrella, la mejor version japonesa del pollo frito",
		url:
			"/imagen/15.jpeg",
		tags: ["Todo", "Comida"]
	}
];

const drinkContainer = document.querySelector(".drinks");

const tagColors = {
	/*Cold: "blue",
	"Non-Alcoholic": "green",*/
	Todo: "pink",
	/*Alcoholic: "red",*/
	Bebida: "yellow",
	Comida: "orange"
};

const drinkSelection = document.querySelector(".tag-selection");

filterDrinks();

drinkContainer.addEventListener("click", function (e) {
	const tagItem = e.target.closest(".drinks__tag");
	if (!tagItem) return;
	const tag = tagItem.textContent;
	highlightTag(tag);
	filterDrinks(tag);
});
drinkSelection.addEventListener("click", function (e) {
	const tagItem = e.target.closest(".drinks__tag");
	if (!tagItem) return;
	const tag = tagItem.textContent;
	if (tagItem.classList.contains("tag-inactive")) {
		highlightTag(tag);
		filterDrinks(tag);
	} else {
		highlightTag();
		filterDrinks();
	}
});

function filterDrinks(tag = "All") {
	if (tag === "All") return printDrinks(drinks);
	const filteredDrinks = drinks.filter((drink) => drink.tags.includes(tag));
	printDrinks(filteredDrinks);
}

function highlightTag(tag = "All") {
	drinkSelection.querySelectorAll("p").forEach((tagSelect) => {
		if (tagSelect.textContent === tag) tagSelect.classList.remove("tag-inactive");
		else tagSelect.classList.add("tag-inactive");
	});
}

function printDrinks(drinkArray) {
	const drinksHtml = "";
	drinkContainer.innerHTML = "";

	drinkArray.forEach((drink) => {
		let tags = "";
		drink.tags.forEach((tag) => {
			const tagHTML = `
                <p class="drinks__tag drinks__tag--${
																	tagColors[tag] ? tagColors[tag] : "grey"
																}">${tag}</p>
            `;
			tags = tags + tagHTML;
		});

		const html = `
            <div class="drinks__item">
                <img src="${drink.url}" alt="Drink">
                <div>
                    <h3>${drink.title}</h3>
                    <p>${drink.description}</p>
                </div>
                <div class="drinks__tags">
                    ${tags}
                </div>
            </div>
        `;

		drinkContainer.insertAdjacentHTML("beforeend", html);
	});
}

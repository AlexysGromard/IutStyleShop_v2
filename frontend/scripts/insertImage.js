/* this script allow us to show the choose image */


const inputFile = document.querySelector('#image-insert');
const imgArea = document.querySelector('#img-part');
const insertBtn = document.querySelector('#button-insert-img');
const form = document.querySelector('.formCreateArticle');

const imagesPart = document.querySelector('.pictures');
var nbImages = 0;


/*Form element*/
const nameText = document.querySelector('#article-name')
const descText = document.querySelector('#article-description')
const categorySelect = document.querySelector('#article-category')
const genderSelect = document.querySelector('#article-gender')
const colorSelect = document.querySelector('#article-color')
const priceText = document.querySelector('#article-price')
const promoText = document.querySelector('#article-promo')
const addProductButton = document.querySelector('#addProductButton')





inputFile.addEventListener("change", function (event) {
	const image = this.files[0]
	if(image.size < 2000000) {
		const reader = new FileReader();
		reader.onload = ()=> {
			const allImg = imgArea.querySelectorAll('img');
			allImg.forEach(item=> item.remove());
			const imgUrl = reader.result;
			const img = document.createElement('img');
			img.src = imgUrl;
            img.style="max-height:282px;width: 282px;";
            while (imgArea.firstChild) {
                imgArea.removeChild(imgArea.firstChild);
            }
			imgArea.appendChild(img);
			imgArea.classList.add('active');
			var selectedFile = event.target.files[0];

            // Vérifier si un fichier a été sélectionné
            if (selectedFile) {
                // Obtenir un objet URL pour le fichier
                var fileURL = URL.createObjectURL(selectedFile);
				imgArea.dataset.img = fileURL;
			}
		}
		reader.readAsDataURL(image);
	} else {
		alert("Image size more than 2MB");
	}
})


insertBtn.addEventListener("click", function (){
	console.log("test");
	if(imgArea.dataset.img != "upload.svg"){
		/*
		var divs = imagesPart.querySelectorAll("div");
        // Supprimer chaque balise div
        divs.forEach(function(div) {
            div.remove();
        });

		const img = document.createElement('img');
		img.src = imgArea.dataset.img;
		imagesPart.appendChild(img)
		nbImages = imagesPart.querySelectorAll("img").length;

		for (var i = nbImages; i < 6; i++) {
			const div = document.createElement('div');
			imagesPart.appendChild(div)
		}

		var boxs = imagesPart.querySelectorAll("div");

		//get all image + tout suprimer
		var allImage = [];
		for (div of imagesPart.querySelectorAll("div")){
			for (img of imagesPart.querySelectorAll("img")){
				allImage.push(img);
				img.remove();
			}
			for (sousDiv of imagesPart.querySelectorAll("img")){
				sousDiv.remove();
			}
			div.remove();
		}



		var divs = imagesPart.querySelectorAll("div")+imagesPart.querySelectorAll("img")
		//suprimer tout
		divs.forEach(function(div) {
            div.remove();
        });
		*/
		var allImage = []
		for (div of imagesPart.querySelectorAll("div")){
			for (Sousdiv of div.querySelectorAll("div")){
				for (img of Sousdiv.querySelectorAll("label")){
					allImage.push(img);
					console.log(allImage)
				}
			}
		}

		const newimg = document.createElement('label');
		newimg.setAttribute("data-image", imgArea.dataset.img);
		allImage.push(newimg);

		updateImage(allImage);

	}

})

function updateImage(allImage){

	
	//get all image + tout suprimer
	
	for (div of imagesPart.querySelectorAll("div")){
		div.remove();
	}
	
	nbImages = allImage.length;
	console.log(nbImages)
	console.log(Math.ceil(nbImages/3)-1)

	for (var numligne = 0; numligne<= Math.ceil(nbImages/3)-1; numligne++){
		var box = document.createElement('div');
		for (var numcolonne = 0; numcolonne< 3; numcolonne++){
			if (numligne*3+numcolonne <= (nbImages-1)){
				console.log(allImage[numligne*3+numcolonne])
				div = document.createElement('div');

				var id = "inputImage"+(numligne*3+numcolonne).toString();

				var label = document.createElement('button');
				label.setAttribute("for", id);
				image.id = id;

				var image = allImage[numligne*3+numcolonne];
				image.setAttribute("for", id);

				div.appendChild(label);
				div.appendChild(allImage[numligne*3+numcolonne]);
				
				box.appendChild(div)
			}else{
				box.appendChild(document.createElement('div'));
			}
			imagesPart.appendChild(box);
		}
	}


}

addProductButton.addEventListener("click", function (){
	var formData = new FormData();
	formData.append("name", nameText.value);
	formData.append("description", descText.value);
	formData.append("category", categorySelect.options[categorySelect.selectedIndex].value);
	formData.append("gender", genderSelect.options[genderSelect.selectedIndex].value);
	formData.append("color", colorSelect.options[colorSelect.selectedIndex].value);
	formData.append("price", priceText.value);
	formData.append("promo", promoText.value);

	var myImages = imagesPart.querySelectorAll("img");
	var linkImages = "";
	myImages.forEach(function(image, _) {
		// Faites quelque chose avec chaque image
		linkImages = linkImages + "|"+ image.src;
	});
	formData.append("images", linkImages);
	




	// Paramètres de la requête
	var options = {
		method: 'POST',
		body: formData,
		// headers: { 'Content-Type': 'application/x-www-form-urlencoded' } // Si les données sont en format x-www-form-urlencoded
	};

	// URL de l'endpoint où vous souhaitez envoyer la requête
	var url = '';	

	// Envoi de la requête
	fetch(url, options)
    .then(response => {
        if (!response.ok) {
            throw new Error('Erreur de réseau ou de serveur');
        }
        return response.text(); // Utilisez response.text() au lieu de response.json()
    })
    .then(data => {
        console.log('Réponse du serveur :', data);
        // Traitez la réponse JSON ici avec JSON.parse si nécessaire
        // var jsonData = JSON.parse(data);
    })
    .catch(error => console.error('Erreur lors de la requête :', error));



})

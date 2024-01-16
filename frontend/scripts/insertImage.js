/* this script allow us to show the choose image */


var inputFile = document.querySelector('#image-insert');
var imgArea = document.querySelector('#img-part');
var insertBtn = document.querySelector('#button-insert-img');
var form = document.querySelector('.formCreateArticle');

var imagesPart = document.querySelector('.pictures');
var nbImages = 0;





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
	if(imgArea.dataset.img != "upload.svg"){
		var allImage = []
		for (div of imagesPart.querySelectorAll("div")){
			for (Sousdiv of div.querySelectorAll("div")){
				for (img of Sousdiv.querySelectorAll("img")){
					allImage.push(img);
				}
			}
		}

		const newimg = document.createElement('img');
		console.log(imgArea.dataset.img);
		newimg.src = imgArea.dataset.img;
		allImage.push(newimg);

		updateImage(allImage);

	}

})

function suprimerImage(numimage){
	var allImage = []
	for (div of imagesPart.querySelectorAll("div")){
		for (Sousdiv of div.querySelectorAll("div")){
			for (img of Sousdiv.querySelectorAll("img")){
				allImage.push(img);
			}
		}
	}

	allImage.splice(numimage, 1);


	updateImage(allImage);
}

function updateImage(allImage){

	
	//get all image + tout suprimer
	
	for (div of imagesPart.querySelectorAll("div")){
		div.remove();
	}
	
	nbImages = allImage.length;

	for (var numligne = 0; numligne<= Math.ceil(nbImages/3)-1; numligne++){
		var box = document.createElement('div');
		for (var numcolonne = 0; numcolonne< 3; numcolonne++){
			if (numligne*3+numcolonne <= (nbImages-1)){
				div = document.createElement('div');

				var id = "inputImage"+(numligne*3+numcolonne).toString();

				var input = document.createElement('input');
				input.setAttribute("id", id);
				input.setAttribute("onclick", "suprimerImage("+id+")");

				var label = document.createElement('label');
				label.setAttribute("for", id);



				div.appendChild(input);
				label.appendChild(allImage[numligne*3+numcolonne]);
				div.appendChild(label);
				
				box.appendChild(div);
			}else{
				box.appendChild(document.createElement('div'));
			}
			imagesPart.appendChild(box);
		}
	}


}

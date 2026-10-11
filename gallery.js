const galleryGrid = document.getElementById("galleryGrid");
const galleryCount = document.getElementById("galleryCount");

function renderGallery() {
    const photos = window.GALLERY_PHOTOS || [];

    galleryGrid.replaceChildren();

    photos.forEach(photo => {
        const card = document.createElement("article");
        card.className = "gallery-card";

        const image = document.createElement("img");
        image.src = photo.url;
        image.alt = photo.title;
        image.loading = "lazy";

        const heading = document.createElement("h3");
        heading.textContent = photo.title;

        const description = document.createElement("p");
        description.textContent = photo.folder;

        card.append(image, heading, description);
        galleryGrid.appendChild(card);
    });

    galleryCount.textContent =
        photos.length + " photos in our gallery";
}

renderGallery();
const avatar = document.getElementById("avatar");
const avatar_preview = document.querySelector(".avatar-preview");

avatar.addEventListener("change", function () {
    const file_image = this.files[0];
    const file_reader = new FileReader();
    file_reader.readAsDataURL(file_image);
    file_reader.onload = function () {
        avatar_preview.src = this.result;
    };
});

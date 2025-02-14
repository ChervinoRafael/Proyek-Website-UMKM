<script>
document.addEventListener("DOMContentLoaded", function() {
    var whatsappButton = document.getElementById("whatsappLink");
    document.getElementById("pemesanan").addEventListener("show.bs.modal", function(event) {
        var button = event.relatedTarget;
        var title = button.getAttribute("data-name");
        var description = button.getAttribute("data-description");
        var imageSrc = button.getAttribute("data-image");
        document.getElementById("modalTitle").textContent = title;
        document.getElementById("modalDescription").textContent = description;
        document.getElementById("modalImage").src = imageSrc;
        var phoneNumber = "6281234567890";
        var message = `Halo, saya ingin memesan ${title}. Bisa dibantu?`;
        var whatsappURL = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
        whatsappButton.href = whatsappURL;
    });
});
</script>
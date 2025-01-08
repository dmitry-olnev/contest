document.addEventListener("DOMContentLoaded", () => {
    const likeLinks = document.querySelectorAll(".like-link");

    likeLinks.forEach(link => {
        link.addEventListener("click", event => {
            event.preventDefault();

            fetch(link.href, { method: "POST" })
                .then(response => {
                    if (response.ok) {
                        alert("Liked successfully!");
                        location.reload();
                    } else {
                        alert("Failed to like.");
                    }
                });
        });
    });
});
// Обработчик события для кнопки удаления
document.addEventListener("DOMContentLoaded", () => {
    const deleteLinks = document.querySelectorAll(".delete-link");

    deleteLinks.forEach(link => {
        link.addEventListener("click", event => {
            event.preventDefault();

            if (confirm("Are you sure you want to delete this news?")) {
                fetch(link.href, { method: "DELETE" })
                    .then(response => {
                        if (response.ok) {
                            alert("News deleted successfully.");
                            location.reload();
                        } else {
                            alert("Failed to delete news.");
                        }
                    });
            }
        });
    });

});
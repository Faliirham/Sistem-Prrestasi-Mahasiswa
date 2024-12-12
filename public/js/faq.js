function toggleAnswer(button) {
    const answer = button.nextElementSibling;
    const isVisible = answer.style.display === "block";
    answer.style.display = isVisible ? "none" : "block";
}

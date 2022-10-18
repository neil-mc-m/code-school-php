const bookingLinks = document.querySelectorAll('.booking-link');
const message = document.querySelector('.booking-message');

for (let i = 0; i < bookingLinks.length; i++) {
    bookingLinks[i].addEventListener('click', function (event) {
        event.preventDefault();
        const classId = this.dataset.classId;
        const userId = this.dataset.userId;
        const data = {
            user_id: userId,
            class_id: classId
        }

        fetch('http://localhost:8888/code-school-php/book-class.php', {
            mode: "cors",
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        }).then((response) => response.json())
            .then((data) => {
                message.innerText = data.message;
                message.style.display = 'block';
            }).catch((error) => {
                console.error('Error:', error);
            });
    })
}
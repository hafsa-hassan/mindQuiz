# MindQuiz

MindQuiz is a web-based quiz application that fetches trivia questions from an API and allows users to play, track scores, and manage their own quiz categories.

## Features

- User authentication (register/login)
- Create and manage personal quiz categories
- Fetch trivia questions from an external API
- Track quiz results
- Admin/user panel separation
- Responsive UI with Bootstrap

## Tech Stack

- **Frontend**: HTML, CSS (Bootstrap), JavaScript, jQuery
- **Backend**: PHP
- **Database**: MySQL
- **Hosting**: InfinityFree (for demo purposes:: https://mindquiz.infinityfreeapp.com/)

## Installation (Local Setup)

1. Clone the repository:

   ```bash
   git clone https://github.com/your-username/mindquiz.git
   ```

2. Move the files into your web server directory:

   ```bash
   sudo cp -r mindquiz/* /opt/htdocs/lamps/
   ```

3. Import the database:

   - Open `phpMyAdmin`
   - Import the `mindquiz.sql` file (included in the repo)

4. Update `path.php` and DB credentials if needed:

   ```php
   define("BASE_URL", "http://localhost/lamps");
   define("ROOT_PATH", "/opt/htdocs/lamps");
   ```

5. Make sure your Apache server is running, then access:
   ```
   http://localhost/lamps
   ```

## Screenshots

![Screenshot 2025-05-30 182404](https://github.com/user-attachments/assets/2b9081fd-5dd1-43c6-aba6-23693d13a60e)
![Screenshot 2025-05-30 182436](https://github.com/user-attachments/assets/75fff202-2402-422b-8591-a1291c274179)
![Screenshot 2025-05-30 182345](https://github.com/user-attachments/assets/309f3ef1-4cfa-4e38-9028-6308b510ef96)
![Screenshot 2025-05-30 182452](https://github.com/user-attachments/assets/91df3667-4db5-4a60-ba8c-fe670a2ac45e)

## TODO / Future Improvements

- Improve mobile responsiveness
- Add difficulty and timer settings
- Enable quiz result history storage
- Allow question contributions

---

## Acknowledgments

- [Open Trivia DB API](https://opentdb.com/)
- Bootstrap & jQuery

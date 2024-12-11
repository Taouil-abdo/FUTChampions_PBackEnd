# README for FUT Champions Ultimate Team Backend Development

## Introduction
This project focuses on developing the backend for the FUT Champions Ultimate Team platform using PHP (procedural) and MySQLi. The aim is to create a robust content management system for managing players, teams, nationalities, and other related entities. A key feature includes multilingual support (i18n).

---

## Features
### 1. **Data Analysis and Optimization**
- Analyze the provided JSON file to design an optimal database schema.
- Apply database normalization to reduce data redundancy.
- Create efficient relational schemas for entities such as players, teams, and nationalities.

### 2. **Entity Management**
- Implement CRUD (Create, Read, Update, Delete) operations for all entities.
- Establish relationships between entities, e.g., associating players with teams and nationalities.

### 3. **Dashboard and Statistics**
- Design a dynamic dashboard to visualize key statistics like player count, nationality distribution, and team performance.
- Integrate interactive charts using libraries such as Chart.js.

### 4. **Internationalization (i18n)**
- Support multiple languages via a dedicated i18n system.
- Manage separate language files (e.g., `fr.php`, `en.php`, `es.php`).
- Provide a language switcher in the dashboard.

### 5. **Documentation**
- Inline comments for all PHP scripts to explain logic.
- Comprehensive README with setup and usage instructions.


---

## Installation Guide

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (e.g., Apache or Nginx)

### Setup Instructions
1. Clone the repository:
   ```bash
   git clone https://github.com/Taouil-abdo/fut-champions-backend.git
   ```

2. Navigate to the project directory:
   ```bash
   cd fut-champions-backend
   ```

3. Import the database:
   - Locate the SQL script in the `database` folder (e.g., `database/schema.sql`).
   - Import it into your MySQL database:
     ```bash
     mysql -u <username> -p < database/schema.sql
     ```

4. Configure the database connection:
   
5. Start the development server:
   ```bash
   php -S localhost:8000
   ```

6. Access the application:
   Open `http://localhost:8000` in your web browser.

---

## File Structure
```
project-root/
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
├── config/
│   └── db.php
├── database/
│   └── schema.sql
├── includes/
│   ├── header.php
│   ├── footer.php
│   └── functions.php
├── pages/
│   ├── dashboard.php
│   ├── players.php
│   └── teams.php
├── i18n/
│   ├── en.php
│   ├── fr.php
│   └── es.php
├── index.php
└── README.md
```


## Key Scripts
### Database Connection
### CRUD Example: Adding a Player

---

## ERD and UML
- **ERD**: Available in the `documentation/erd.png` file.
- **Use Case Diagram**: Available in the `documentation/use_case.png` file.

---

## Deployment
(Optional)
Use a platform like Heroku, AWS, or a shared hosting provider to deploy the application.

---

## Security Measures
- **SQL Injection Protection**: Use prepared statements.
- **XSS Prevention**: Sanitize all user inputs.
- **Secure Connection Credentials**: Store sensitive data in environment variables.

---

## Evaluation Checklist
- Functional PHP scripts for all backend features.
- Optimized SQL queries and database structure.
- Proper comments and documentation for code clarity.
- Responsive and efficient performance.

---

## Contributing
- Fork the repository.
- Create a feature branch:
  ```bash
  git checkout -b feature-name
  ```
- Commit changes:
  ```bash
  git commit -m "Add feature description"
  ```
- Push to the branch:
  ```bash
  git push origin feature-name
  ```
- Open a pull request.

---

## License
Youcode.
---

## Contact
For any inquiries, please contact:
- **Name**: Taouil Abdo
- **GitHub**: [https://github.com/Taouil-abdo](https://github.com/Taouil-abdo)

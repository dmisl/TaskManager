![Alt text](https://api.centous.com/wp-content/uploads/2023/08/laravelvuejs.png)
> [!WARNING]  
> Note: Task Buddy is currently under development, and we're continuously working on new features and improvements. Stay tuned for updates!
> Figma: https://www.figma.com/community/file/1432901469163865988
---
## 📋 Roadmap

- [About](#about)
- [Tech Stack](#tech_stack)
- [Server Requiremenets](#requirements)
- [Running the Program](#running)
- [Features](#features)

## 🧐 About <a id = "about"></a>

**Task Buddy** is a <ins>productivity app</ins> designed to help you stay disciplined and achieve your goals by managing your daily tasks with ease and efficiency. Whether you're setting long-term goals or handling everyday to-dos, Task Buddy offers a robust set of features to keep you on track and make the process effortless. Best of all, it's completely **free to use**!
Something more new

## 🏗️ Tech Stack <a id = "tech_stack"></a>

- [PHP](https://www.php.net/)
- [Laravel](https://laravel.com/)
- [Vite](https://vitejs.dev/)
- [Native JS](https://vuejs.org/)
<!-- - [Vue](https://vuejs.org/) -->
- [Tippy.js](https://atomiks.github.io/tippyjs/)
<!-- - [Dragula.js](https://bevacqua.github.io/dragula/) -->
- [Freepik API](https://www.freepik.com/api)
- [Axios](https://github.com/axios/axios)
- [MySQL database](https://www.mysql.com/)
- [Bootstrap](https://getbootstrap.com/)
- [Figma](https://www.figma.com/)

## ⚙️ Requiremenets <a id = "requirements"></a>

> [!WARNING]
> In development

Server requirements to run locally:
- PHP >= 8.2
<!-- - [Node.js](https://nodejs.org/en/download) (LTS) -->
- MySQL 8.0

To run on Docker:
- [Docker](https://www.docker.com/products/docker-desktop/)

## 🚀 Running the Program <a id = "running"></a>

> [!WARNING]
> In development

To run the program locally, simply clone the repository and execute the start script:
```
git clone https://github.com/dmisl/TaskBuddy.git
cd <project_directory>
php start.php
```
This script automates all necessary setup steps, including installing PHP/JS dependencies, setting up environment variables, running migrations, starting the development server, and launching the WebSocket server (Laravel Reverb).

Once the script completes, your program will be up and running, ready for you to use.

---

To run the program using Docker:

Before running Docker commands, update the .env file with your database configuration.

```
DB_HOST=database
DB_USERNAME=someone
DB_PASSWORD=secret
```
then run
```
php start.php
docker-compose build
docker-compose up
```

This will set up the program environment using Docker, allowing you to run it seamlessly. (If you encounter any issues with the environment run `docker-compose down` then `docker-compose up`)

## 💡 Features <a id = "features"></a>

# Task Buddy Features

## 1. Task Management
- **Description:** Serves as the core functionality of Task Buddy, enabling users to create, organize, and manage tasks effectively.
- **Functionality:** Users can add, edit, and delete tasks, set due dates, and categorize tasks based on priority levels.

## 2. Goal Setting
- **Description:** Allows users to define and track personal or professional goals.
- **Functionality:** Users can create specific, measurable goals and break them down into smaller, actionable tasks to enhance focus and accountability.

## 3. Priority Levels
- **Description:** Helps users prioritize their tasks based on urgency and importance.
- **Functionality:** Users can assign priority levels (high, medium, low) to tasks, enabling better time management and decision-making.

## 4. Progress Tracking
- **Description:** Provides an overview of progress towards goals and tasks.
- **Functionality:** Users can view completed tasks and monitor their progress through visual statistics and completion rates.

## 5. Comments and Notes
- **Description:** Allows users to add notes or comments to individual tasks for better context.
- **Functionality:** Users can include important information or reminders related to each task, aiding in organization and clarity.

## 6. Statistics and Analytics
- **Description:** Offers insights into task completion rates and productivity trends.
- **Functionality:** Users can analyze their productivity over time through charts and metrics, helping them understand their work habits.

## 7. Freepik API Integration
- **Description:** Enhances user experience by allowing the integration of custom visuals and icons.
- **Functionality:** Users can personalize tasks and goals with icons and images sourced from Freepik, making the interface more engaging.

## 8. User-Friendly Interface
- **Description:** Designed for simplicity and ease of use, making task management accessible to everyone.
- **Functionality:** Intuitive navigation and a minimalistic layout ensure users can quickly add and manage tasks without unnecessary complexity.

## 9. Alerts and Notifications
- **Description:** Keeps users informed about upcoming deadlines and reminders.
- **Functionality:** Users receive notifications for upcoming due dates and task reminders, ensuring they stay on track.

## 10. Cloud Sync
- **Description:** Provides seamless access to tasks and goals across multiple devices.
- **Functionality:** Users can synchronize their data with cloud services, enabling them to access their tasks anytime, anywhere.

## 11. Collaboration Features
- **Description:** Enables teamwork by allowing users to share tasks and goals with others.
- **Functionality:** Users can invite collaborators to work on shared tasks or goals, enhancing productivity through teamwork.

## 12. Feedback System
- **Description:** Encourages user feedback for continuous improvement.
- **Functionality:** Users can submit feedback and suggestions for new features, helping to shape the future of Task Buddy.

> [!NOTE]
> Task structure is in development

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Exam App

Exam App is a slightly more advanced and corporate version of the Quiz App application I wrote earlier. Specifically, course / course categories can be created on the management panel of the system. Quizzes can be created for these categories. Then, questions and answers are determined for these quizzes. (Note that all these include deletion and update and listing processes)

<img src="https://www.linkpicture.com/q/Screenshot-from-2021-05-21-14-04-50.png" type="image" alt="ExamApp-pic">

In addition to all these, students or study groups who are members of the system are assigned to the courses and courses requested / determined by the administrators. Students can follow these assignments from their own profiles. They can solve quizzes to which they have been assigned.

Students / trainees are required to take the exams within the time specified by the administrators / instructors. There is a dynamically decreasing counter on the exam screen. In addition, the exam screen was prepared with a question on a single page. Students can use the previous and next buttons to skip the questions they have solved or to return to the previous question. The exam screen is closed to right click.

<img src="https://www.linkpicture.com/q/Screenshot-from-2021-05-21-14-07-51.png" type="image" alt="ExamApp-pic">

The trainee who fails to complete the exam within the specified time will encounter a notification that the exam has ended with the end of the period and is recorded in the database along with the exam statistics.

Exam results details are shown in detail on the administration panel. In addition, certain statistics are shared with the participant. In addition, general statistics (number of quizzes, number of students, number of questions, etc.) are shared on the dashboard. 

## Using and Downloading App

First of all, replace the env.example file with your database information.</br>
Next copy your .env file to the project.</br>
Then create a database called exam.</br>
After Then run the php artisan migrate command.</br> 
In DatabaseSeeder.php update your information.
Finally, add your data to your tables with the php artisan migrate: fresh --seed command.</br>
Now you can examine the project with peace of mind :)

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

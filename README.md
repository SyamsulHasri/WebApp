<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<h1>TO-DO Web App</h1>

LOGIN <br>
    1.Email <br>
    2.Validation

Register  <br>
    1.Name,Email, Phone, Password  <br>
    2.Validation
    
User Type  <br>
    1. Free: Limit create 10 Task Only  <br>
    2. Premium: Unlimited create To DO
    
TO DO Item <br>
    1.Title <br>
    2.Description <br>
    3.Date <br>
    4.Toggle set reminder
    
Achievement <br>
    1.Every 10 to do get 1 Achivement

Badge <br>
    1. 2 Achivement 1st badge <br>
    2. 5 Achivement 2nd bagde <br>
    3. 10 Achivement 3rd bagde
    
Page
    1.Display To Do List (sort by latest, paginatable, hide/block unpleasent word)  <br>
    2.Create To Do (limit 10 words, avoid duplicate,hide/block unpleasent word) <br>
    3.Edit/Delete To Do
    
Middleware <br>
    1.When create To DO, Block free user from create when reach limit and redirect to page upgrade
    
Queue (Job) <br>
    1. Send reminder to email based on to do date(if set)
    
Event and Listener <br>
    1. Each to do activity, add to log


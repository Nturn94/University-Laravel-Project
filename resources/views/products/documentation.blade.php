@extends('layouts.master')

@section('title')
    Documentation
@endsection



@section('content')

    <h1> 2703ICT Assignment Two </h1><br>
    By Nathan Turnbull S2808290<br>
    <h2> Completed Tasks </h2>
    I was able to complete and implement numbers 1-13. <br>
    I have three tables within my database. Items (Products), Reviews and Users. Each of these tables has a corresponding model. The relationships are as follows:
    <ul>
        <li>Many Reviews to one item</li>
        <li>Many Reviews to one User</li>
    </ul>
    I have two controllers used for routing. A Product controller and a Review controller. I implemented these instead of the routing method used in assignment one.<br>

    Validation is done in raw php within the specific views. Most fields require an input and url requires a proper format.<br>

    I have some seeder files so the database isn’t empty on launch.<br>

    Views are inherited from the master layout. There are two folders for views they are: product and review. They are similar but review does not need as many views.<br>

    The website can add, edit, and delete items and reviews. Reviewers can edit and delete their own reviews regardless of user rank.<br>

    Logging in and out is a feature.<br>

    There are two ranks of accounts. moderator and member. (both lower case). These can be assigned at registration.<br>

    <h2> Things not completed </h2><br>
    The lecture covers pagination and uploading images. I with more time I would have closely followed the lecture and implemented these features<br>

    Following requires a user to have an array of user_ids also a view to present that data.<br>

    Liking and disliking require an array of user_id’s per review. The user can subtract or add their “user_id”.<br>

    <h2> Process </h2>
    I followed the lectures closely. Once I had a working base I edited and tested small bits at a time. I didn’t use version control, but I did make backups. I would try an idea, get a new error, google that error, and try and understand it.






@endsection
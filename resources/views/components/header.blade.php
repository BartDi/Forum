<style>
    header{
        width: 100%;
        height: 100px;
    }
    li{
        float:left;
        list-style:none;
        padding:20px;
    }
    a{
        text-decoration:none;
    }
    #user{
        float:right;
    }
    #end{
        clear:both;
    }
</style>
<header>
    <ul>
        <a href="{{url('/')}}">
            <li>Main</li>
        </a>
        <a href="{{url('/create')}}">
            <li>Create Post</li>
        </a>
        <a href="{{url('/addCat')}}">
            <li>Add Category</li>
        </a>
    </ul>
    <div id="user">
        <a href='{{url("/users/{$user_id}")}}'><h2>ACCOUNT</h2></a>
    </div>
</header>

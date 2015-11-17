<!--
/**
 * Created by PhpStorm.
 * User: vitaliy
 * Date: 16.11.15
 * Time: 11:44
 */
 -->
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">

        <li class="active"><a href="#"><span class="glyphicon glyphicon-dashboard"></span> Chat</a></li>
        <li role="presentation" class="divider"></li>
        <li><a href="{{URL::route('logout')}}"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
    </ul>
</div><!--/.sidebar-->
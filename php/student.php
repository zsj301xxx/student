<!DOCTYPE html>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/student.js"></script>
    <style>
        input{
            background: none;
            border: none;
        }
        .form-horizontal{
            display: none;
        }
    </style>
</head>
<body>
<div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="transition:5s;width:0;position: absolute;z-index: 999;height: 5px">
        <span class="sr-only">60% Complete</span>
    </div>
</div>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active add"><a href="#">添加 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="">
                               <?php
                               session_start();
                               echo $_SESSION['username'];
                               ?>
                    </a>

                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<form class="form-horizontal" style="width: 500px;margin-left: 200px">
    <div class="form-group">
        <label  class="col-sm-2 control-label">姓名</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="请输入姓名">
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-2 control-label">性别</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="sex" placeholder="请输入性别">
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-2 control-label">年龄</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="age" placeholder="请输入年龄">
        </div>
    </div>
    <div class="form-group">
        <label  class="col-sm-2 control-label">专业</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="major" placeholder="请输入专业">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">提交</button>
        </div>
    </div>
</form>
<table class="table table-striped box">
    <tr>
        <td>姓名</td>
        <td>性别</td>
        <td>年龄</td>
        <td>专业</td>
        <td>功能</td>
    </tr>

</table>


</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
*{
    margin:0;
    padding:0;
}

#main{
    text-align:center;
    font-family:Arial;
}

#header{
    background:#2980b9;
    color:white;
    padding:25px 0px;
    font-size:25px;
}

#content{
    margin:50px 200px;
}

table{
    text-align:left;
}

label{
    font-weight:700;
}

#name{
    border-radius:4px;
    width:250px;
    height:25px;
    margin:0px 0px 20px 5px;
    padding-left:10px;
    font-size:16px;
}

.lang{
    margin:0px 0px 20px 15px;
}

#submit{
    border-radius:3px;
    background:#2980b9;
    color:#fff;
    padding:5px 15px;
    font-size:16px;
}
</style>

<body>
    <div id="main">
        <div id="header">
            <h1>Insert Check Box Value In Database</h1>
        </div>
        <div id="content">
            <form id="student-form">
                <table>
                    <tr>
                        <td valign="top"><label>Name</label></td>
                        <td><input type="text" name="name" id="name" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td valign="top"><label>Languages</label></td>
                        <td>
                            <input type="checkbox" class="lang" value="PHP"> PHP <br>
                            <input type="checkbox" class="lang" value="Java"> Java <br>
                            <input type="checkbox" class="lang" value="C#"> C# <br>
                            <input type="checkbox" class="lang" value="Asp.Net"> Asp.Net <br>
                            <input type="checkbox" class="lang" value="Python"> Python <br>
                            <input type="checkbox" class="lang" value="Ruby"> Ruby <br>
                            <input type="checkbox" class="lang" value="C++"> C++ <br>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Submit" id="submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function(){
            $("#student-form").submit(function(e){
                e.preventDefault();

                var name=$("#name").val();
                var languages=[];

                $(".lang").each(function(){
                    if($(this).is(":checked")){
                        languages.push($(this).val());
                    }
                });
                languages=languages.toString();

                if(name != '' && languages.length !== 0){
                    $.ajax({
                        url:"insert.php",
                        method:"POST",
                        data:{name:name,language:languages},
                        success:function(data){
                            $("#student-form").trigger('reset');
                            alert(data);
                        }
                    });              
                }
                else{
                    alert("ful fill the requirments first");
                }
            });
        });
    </script>
</body>
</html>
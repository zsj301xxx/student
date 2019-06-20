$(function () {
    let table = $('.box>tbody');
     let progress=$('.progress');
    let progressnei=$('.progress-bar');
    let addform=$('.form-horizontal');
    let addbom=$('.add');
    let tijiao=$('.btn-default');


    //展开添加

    addbom.on('click',function () {
        addform.toggle();
        });

    //添加提交事件
    tijiao.on('click',function () {
        addform.toggle();
        let qs =addform.serialize();
        let data=addform.serializeArray();

        $.ajax({
            url:'../php/insert.php',
            type:'POST',
            async:true,
            data:qs,
            dataType:'json',
            success:function (res) {
                console.log(1);
                if (res.code == 1){
                    console.log(1);
                    let obj=arrayToJson(data);
                   obj.id=res.id;
                   render([obj]);

                }
            }
        });
        console.log(addform);
        console.log(addform[0]);
        addform[0].reset();

    });
    function arrayToJson(data){
        let obj={};
        data.forEach(ele=>{
            let {name,value}=ele;
            obj[name]=value;
        });
        return obj;
    }



    $(document).ajaxStart(function () {


        progressnei.css({width:'30%',display:'block'})
    });
    $(document).ajaxSuccess(function () {
        progressnei.css({width:'100%',display:'block'})
    });
    progressnei.on('webkitTransitionEnd',function () {
        $(this).css({width:'0',display:'none'});

    });

    $.ajax({
        url:'../php/query.php',
        type:'GET',
        async:true,
        data:"name=zhangsan&age=18",
        dataType:'json',
        success: function (res) {
            let {code,data} = res;

            if (code == 1){
                render(data);
            }
        }
    });

    //删除
    table.on('click','button',function () {

        let tr = $(this).closest('tr');
        let id = tr.attr('id');
        $.ajax({
            url:'../php/delete.php',
            type:'POST',
            async:true,
            data:{id},
            dataType:'json',
            success: function (res) {
                let {code,data} = res;
                if (code == 1){

                    tr.remove();
                }else{

                }
            }
        });
    });
    table.on('blur','input',{},function () {
        let tr = $(this).closest('tr');
        let id = tr.attr('id');
        let val=$(this).val();
        let type=$(this).data('type');
        $.ajax({
            url:'../php/update.php',
            type:'POST',
            async:true,
            data:{type,val,id},
            dataType:'json',
            success:function (res) {
                console.log(1);
                let {code,data} = res;
                if (code == 1){


                }else{

                }
            }
        });
    })

    //render
    function render(data) {
        let html = '';
        data.forEach(ele=>{
            html +=`
                <tr id="${ele.id}">            
                    <td><input type="text" value="${ele.name}" data-type="name"></td>
                    <td><input type="text" value="${ele.sex}" data-type="sex"></td>
                    <td><input type="text" value="${ele.age}" data-type="age"></td>
                    <td><input type="text" value="${ele.major}" data-type="major"></td>
                    <td><button class="btn btn-warning btn-sm">删除</button></td>
                </tr>
            `
        });

        table.html(function (index, value) {
            table.html((index,value)=>value+=html);

        })

    }
});
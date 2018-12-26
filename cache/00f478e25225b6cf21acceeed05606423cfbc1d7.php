<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>房源检索</title>
    <link rel="stylesheet" href="<?php echo e(asset("bootstrap-3.3.7-dist/css/bootstrap.min.css")); ?>">
    <link rel="stylesheet" href="<?php echo e(asset("css/tagcloud.min.css")); ?>">

</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <ul class="nav navbar-nav">
            <li><a href="/house/list">房源列表</a></li>
            <?php if(env('APP_ENV')!='production'): ?>
                <li><a href="/analysis">数据分析</a></li>
            <?php endif; ?>
            <li><a href="http://www.wjhokey.top">另一个网站</a></li>
        </ul>
        
    </div>
</nav>

<div class="container">
    <div class="row">
        <?php echo $__env->make('house.search-form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <br>
        <div class="col-md-9">
            <div class="list-group">
                <?php $__currentLoopData = $houses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $house): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="javascript:;" class="list-group-item" data-id="<?php echo e($house->id); ?>" data-href="<?php echo e($house->url); ?>" data-toggle="modal" data-target="#myModal">
                        <?php if(mb_strlen($house->title) > 47): ?> <?php echo e(mb_substr($house->title, 0, 47)); ?>... <?php else: ?> <?php echo e($house->title); ?> <?php endif; ?>
                        <span class="badge"><?php echo e($house->created_at); ?></span>
                        <?php if($house->if_has_images): ?>
                            <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                        <?php endif; ?>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php echo e($houses->appends($search)->render()); ?>

        </div>

        <div class="col-md-3">
            
            <div>
                <div class="tagcloud">
                    <?php echo $__env->make('house.tagCloud', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
            <ul class="nav">
                
                
            </ul>
        </div>

    </div>

</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width: 960px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></h4>
            </div>
            <div class="modal-body">
                <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <a href="" class="btn btn-primary redirect-url">跳转</a>
            </div>
        </div>
    </div>
</div>



<script src="<?php echo e(asset("plugins/jQuery/jQuery-2.1.4.min.js")); ?>"></script>
<script src="<?php echo e(asset('bootstrap-3.3.7-dist/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/tagcloud.min.js')); ?>"></script>













<link href="<?php echo e(asset('plugins/datepicker/bootstrap-datetimepicker.min.css')); ?>" rel="stylesheet"
      type="text/css"/>
<script src="<?php echo e(asset('plugins/datepicker/bootstrap-datetimepicker.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('plugins/datepicker/locales/bootstrap-datetimepicker.zh-CN.js')); ?>"
        type="text/javascript"></script>
<script>
    $(function () {
        tagcloud({
            //参数名: 默认值
            selector: ".tagcloud",  //元素选择器
            fontsize: 16,       //基本字体大小
            radius: 100,         //滚动半径
            mspeed: "normal",   //滚动最大速度
            ispeed: "normal",   //滚动初速度
            direction: 135,     //初始滚动方向
            keep: false          //鼠标移出组件后是否继续随鼠标滚动
        });

        $('.date').datetimepicker({
            language: 'zh-CN',
            format: 'yyyy-mm-dd',
            weekStart: 0,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });

        $('#myModal').on('show.bs.modal', function (event) {
            var a = $(event.relatedTarget);
            var url = a.data('href');
            var id = a.data('id');
            $.ajax({
                type : "post",
                url : "<?php echo e(url('ajax-get-house-detail')); ?>",
                data : "id=" + id,
                async : true,
                success : function(res){
                    var modal = $('#myModal');
//                    var self = this;
//                    var modal = $(this);
//                    console.log(modal.html());

//                    console.log(modal.html());
//                    console.log(modal.find('.modal-body').text());
                    modal.find('.modal-title').html(res.title);
                    modal.find('.modal-body').html(res.content);
                    modal.find('.redirect-url').attr('href', res.url);
                }
            });
        })

    })
</script>
</body>
</html>
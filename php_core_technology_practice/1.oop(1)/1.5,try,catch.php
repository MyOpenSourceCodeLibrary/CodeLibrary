
/**
 * 异常处理机制
 * 模拟文件上传的场景
 * 伪代码
 * */


try{

// 可能出错的代码段

    if(文件上传不成功) throw(上传异常);

    if(插入数据库不成功) throw(数据库操作异常);

}catch(异常){

    必须的补救措施，如删除文件、删除数据库插入记录，这个处理很细致

}

// ....


    也可以如下：



上传{

    if(文件上传不成功) throw(上传异常);

    if(插入数据库不成功) throw(数据库操作异常);

}

// 其他代码...

try{

    上传;

    其他;

}catch(上传异常){

    必须的补救措施，如删除文件，删除数据库插入记录

}catch(其他异常){

    记录log

}

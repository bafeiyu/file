<?php
/**
 * #文件操作类
 *
 * Created by
 * @Author: lihuan<1016963252@qq.com>
 * @Datetime: 2020-4-21 10:58
 **/
class File extends SplFileInfo
{
    //文件的完整路径
    public $file = '';
    //文件名
    public $name = '';
    //文件大小
    public $size = '';
    //文件绝对路径
    public $path = '';
    //创建时间
    public $cTime = '';
    //最后一次修改时间
    public $mTime = '';
    //最后一次访问的时间
    public $aTime = '';
    //是目录
    public $isDir = false;
    //是文件
    public $isFile = false;
    //是否存在
    public $isExist = false;
    //是否可读
    public $isRead = false;
    //是否可写
    public $isWrite = false;

    public function __construct($file)
    {
        $this->file = $file;
    }

    public function getBasename($suffix = null)
    {
        $this->name = basename($this->file, $suffix);
        return $this->name;
    }

    public function getSize()
    {
        //关闭https校验
        stream_context_set_default([
            'ssl' => [
                'verify_host' => false,
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ]);
        $this->size = get_headers($this->file);
        return $this->size;
    }

    public function getPath()
    {
        $this->path = dirname($this->file);
        return $this->path;
    }

    public function getCTime()
    {
        $this->cTime = filectime($this->file);
        return $this->cTime;
    }

    public function getMTime()
    {
        $this->mTime = filemtime($this->file);
        return $this->mTime;
    }

    public function getATime()
    {
        $this->aTime = fileatime($this->file);
        return $this->aTime;
    }

    public function isDir()
    {
        $this->isDir = is_dir($this->file);
        return $this->isDir;
    }

    public function isFile()
    {
        $this->isFile = is_file($this->file);
        return $this->isFile;
        
    }

    //1.写入文件
    //2.读取文件
    //3.删除文件
    //4.复制文件
    //5.压缩文件
    //6.解压缩文件
    //7.重写文件
    //8.统计文件行
}
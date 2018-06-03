$("#imagenes").fileinput({
    maxFileCount: 4,
    validateInitialCount: true,
    overwriteInitial: false,
    initialPreview: [
        "<img style='height:160px' src='http://lorempixel.com/800/460/nature/1'>",
        "<img style='height:160px' src='http://lorempixel.com/800/460/nature/2'>",
        "<img style='height:160px' src='http://lorempixel.com/800/460/nature/3'>",
    ],
    initialPreviewConfig: [
        {caption: "Nature-1.jpg", size: 628782, width: "120px", url: "/site/file-delete", key: 1},
        {caption: "Nature-2.jpg", size: 982873, width: "120px", url: "/site/file-delete", key: 2},
        {caption: "Nature-3.jpg", size: 567728, width: "120px", url: "/site/file-delete", key: 3},
    ],
    allowedFileExtensions: ["jpg", "png", "gif"]
});

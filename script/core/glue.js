const grabNode=(className, callback)=>{
    grabPart = Array.from(document.getElementsByClassName(className));
    grabPart.map((key) => {
        callback(key)
    });
}

export {grabNode}
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator Mode</title>
<style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    html, body { 
        height: 100%; 
        overflow: hidden;
        margin: 0;
        padding: 0;
    }
    #admin-wrapper {
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        position: relative;
    }
    #top-frame { 
        width: 100%; 
        height: 50px; 
        border: none;
        display: block;
        border-bottom: 1px solid #ddd;
        flex-shrink: 0;
    }
    #container {
        display: flex;
        flex: 1;
        width: 100%;
        overflow: hidden;
        position: relative;
    }
    #menu-frame {
        width: 220px;
        height: 100%;
        border: none;
        border-right: 1px solid #ddd;
        background: #f5f5f5;
        flex-shrink: 0;
    }
    #detail-frame {
        flex: 1;
        height: 100%;
        border: none;
        background: #fff;
        overflow: auto;
    }
</style>
</head>
<body>
    <div id="admin-wrapper">
        <iframe id="top-frame" src="/secure-admin/top"></iframe>
        <div id="container">
            <iframe id="menu-frame" src="/secure-admin/menu"></iframe>
            <iframe id="detail-frame" name="detail" src="<?=$frame_url?>"></iframe>
        </div>
    </div>
</body>
</html>
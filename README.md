Device Switching Shortcode Plugin
======================
ショートコードでデバイスごとに表示する内容を振り分けることができるようになるWordpressプラグイン

使い方
------
http://creatorish.com/lab/4411

    [switch target="ターゲットデバイス"]表示する内容[/switch]

ターゲットデバイス名の種類
------
+    pc: フィーチャーフォンでもタブレットでもスマートフォンでもないときに表示します。
+    tablet: タブレット端末でのアクセス時に表示します
+    mobile: スマートフォン端末でのアクセス時に表示します
+    feature: フィーチャーフォンでのアクセス時に表示します

カンマ区切りで複数のデバイスを指定できます。

    [switch target="tablet,mobile"]タブレットとスマートフォン用の内容[/switch]

動作確認
------
wordpress3.4↑で動作確認

ライセンス
--------
[MIT]: http://www.opensource.org/licenses/mit-license.php
Copyright &copy; 2012 creatorish.com
Distributed under the [MIT License][mit].

作者
--------
creatorish yuu  
Weblog: <http://creatorish.com>  
Facebook: <http://facebook.com/creatorish>  
Twitter: <http://twitter.jp/creatorish>
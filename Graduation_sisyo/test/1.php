<form action="2.php" method="get">]




    <select name="example">
        <option value="0" name="book">書籍</option>
        <option value="1" name="music">音楽</option>
        <option value="2" name="movie">映像</option>
    </select>
    <input type="submit" name="img" value="sousinn">
</form>


<?php
//データベース接続

session_start();

if (isset($_SESSION["errb1"]) and $_SESSION["errb1"] ==  "1") {
?>

    <table id="firstBox" border="1" width="830">

        <tbody>
            <tr>
                <th>
                    分類
                </th>
                <td>
                    <select name="genre">
                        <option value="00">総記</option>
                        <option value="10">哲学</option>
                        <option value="20">歴史</option>
                        <option value="30">社会科学</option>
                        <option value="40">自然科学</option>
                        <option value="50">技術・工学</option>
                        <option value="60">産業</option>
                        <option value="70">芸術・美術</option>
                        <option value="80">言語</option>
                        <option value="90">文学</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>
                    画像アップロード
                </th>
                <td>
                    <input type="file" name="image" accept="image/jpeg">
                </td>
            </tr>

            <tr>

                <th>
                    題名
                </th>
                <td>
                    <input type="text" id="bookName" name="bookName" required>
                </td>

            </tr>

            <tr>
                <th>
                    ISBNコード
                </th>
                <td>
                    <input type="radio" id="isbn" name="isbn" value="isbn" checked>ISBNあり
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                    <input type="radio" id="noisbn" name="isbn" value="noisbn" checked>ISBNなし

                </td>


            </tr>

            <tr>
                <th>
                    著者名
                </th>
                <td>
                    <input type="text" id="writer" name="writer" required>
                </td>
            </tr>

            <tr>
                <th>
                    出版社名
                </th>
                <td>
                    <input type="text" id="publisher" name="publisher" required>
                </td>
            </tr>



        </tbody>
    </table>
<?php

    unset($_SESSION["errb1"]);
} else if (isset($_SESSION["errb1"]) and $_SESSION["errb1"] == "2") {
?>

    <table id="secondBox" border="1" width="830">

        <tbody>
            <tr>
                <th>
                    画像アップロード
                </th>
                <td>
                    <input type="file" name="image" accept="image/jpeg">
                </td>
            </tr>

            <tr>

                <th>
                    題名
                </th>
                <td>
                    <input type="text" id="musicName" name="musicName" required>
                </td>

            </tr>



            <tr>
                <th>
                    作詞者
                </th>
                <td>
                    <input type="text" id="lyric" name="lyric" required>
                </td>
            </tr>

            <tr>
                <th>
                    作曲者
                </th>
                <td>
                    <input type="text" id="bgm" name="bgm" required>
                </td>
            </tr>



            <tr>
                <th>
                    歌手
                </th>
                <td>
                    <input type="text" id="singer" name="singer" required>
                </td>
            </tr>

            <tr>
                <th>
                    レコード会社
                </th>
                <td>
                    <input type="text" id="record" name="record" required>
                </td>
            </tr>
        </tbody>
    </table>

<?php

    unset($_SESSION["errb1"]);
} else if (isset($_SESSION["errb1"])  and $_SESSION["errb1"] == "3") {
?>

    <table id="secondBox" border="1" width="830">

        <tbody>
            <tr>
                <th>
                    画像アップロード
                </th>
                <td>
                    <input type="file" name="image" accept="image/jpeg">
                </td>
            </tr>

            <tr>

                <th>
                    題名
                </th>
                <td>
                    <input type="text" id="musicName" name="musicName" required>
                </td>

            </tr>

            <tr>
                <th>
                    監督
                </th>
                <td>
                    <input type="text" id="singer" name="singer" required>
                </td>
            </tr>

            <tr>
                <th>
                    制作会社
                </th>
                <td>
                    <input type="text" id="record" name="record" required>
                </td>
            </tr>
        </tbody>
    </table>
<?php
unset($_SESSION["errb1"]);
}
?>

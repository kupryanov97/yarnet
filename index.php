<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Молокозавод2.0</title>
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<header>
  <ul>
    <li>
      <a href="#">Home
  			<span></span>
  			<span></span>
  			<span></span>
  			<span></span>
  		</a>
    </li>
    <li>
      <a href="#tanks">About
  			<span></span>
  			<span></span>
  			<span></span>
  			<span></span>
  		</a>
    </li>
    <li>
      <a href="#add">Add filler
  			<span></span>
  			<span></span>
  			<span></span>
  			<span></span>
  		</a>
    </li>
    <li>
      <a href="#fillers">Fillers
  			<span></span>
  			<span></span>
  			<span></span>
  			<span></span>
  		</a>
    </li>
  </ul>
  <img class="logo-head" src="https://saferegion.net/img/logo-red.png">
  <div class="head-about">
  <a href="tel://+7 (495) 532-79-81" class="phone">+7 (495) 532-79-81</a>
    </br>
    <a href="" class="submitbutton">Заказать</a>
    </br>
  </div>
</header>

<body>
  <div id="tanks" style="background-color:white;opacity:0.8;margin-left:15%;width:70%;">
    <div style="margin-top:30px;margin-bottom:30px;" id='vueapp'>
    <p style="font-size:30px; margin-left:20%;">Общая сводка по наполненности цистерн</p>
      <div  class="tank" v-for='(tank,index) in tanks'>
        <span class="name_text">Цистерна номер {{ tank.id }}</span>
        <progress class="litres" :value="tank.litres" :max="max" show-progress animated></progress>
        <p style="max-width:200px">Занято {{ tank.litres}} литров из 300</p>
      </div>
      </br>
      <div class="divider"></div>
      <div id="add" class="add" >
        <form name="add">
          <p style="font-size:30px;">Добавить молоко:</p>
          </br>
          <label>Ваше имя</label>
          </br>
          <input type="text" name="name" v-model="name">
          </br>
          <label>Число литров</label>
          </br>
          <input type="text" name="litres" v-model="litres">
          </br>
          <input class="button-add" type="submit" name="submit" @click="updateTank()" value="Отправить">
        </form>
      </div>
      <div class="divider"></div>
      <p style="font-size:30px; margin-left:20%;">ЗАЛИВЩИКИ</p>
      <div id='fillers' >
        <table>
          <tr>
            <th colspan="2">Кто заливал</th>
            <th>Сколько залил</th>
          </tr>
          <tr v-for="(fil,index) in fill">
            <td></td>
            <td>{{ fil.name }}</td>
            <td>{{ fil.litres }}</td>
          </tr>
        </table>
        <table>
        </table>
      </div>
    </div>
   </div>
</body>
<footer>
  <img class="logo-foot" src="https://saferegion.net/img/logo-red.png">
  <div class="about">
    <p>Телефон: такой-то</p>
    <p>Адрес: <span style="text-decoration: underline;">такой-то</span></p>
    <p>Почта: <span style="text-decoration: underline;">такой-то</span></p>
    </br>
    <p>2010-2020 Ярнет все права защищены</p>
  </div>
</footer>

</html>

<style>
.submitbutton {
    background: #f05936;
    font-family: 'Roboto Slab', serif;
    font-size: 18px;
    text-transform: uppercase;
    padding: 12px 72px;
    text-decoration: none;
    border-radius: 30px;
    box-shadow: 0 0 5px rgba(0,0,0,0.5);
    top: 29px;
    margin-left:10%;
}
    .phone {
    float: left;
    padding-left: 21px;
    margin-top: 24px;
    margin-left: 10%;
    font-size: 18px;
    font-weight: bold;
    }
    body {
        width:100%;
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background-color: #262626;	
    }
    ul {
        position: fixed;
        background-color:black;
        left: 50%;
        width: 100%;
        transform: translate(-50%, -50%);
        margin: 0;
        padding: 0;
        margin-top:20px;
        z-index:100;
        height:50px;
        display: flex;
    }
    ul li {
        left: 31%;
        position: relative;
        list-style: none;
    }
    ul li a {
        position: relative;
        width: 100px;
        height: 40px;
        display: block;
        color: tomato;
        line-height: 40px;
        text-align: center;
        text-decoration: none;
    text-transform: uppercase;
        transition: .5s;
        box-sizing: border-box;
    }
    ul li a span {
        position: absolute;
        width: 25%;
        height: 100%;
        background-color: tomato;
        transform-origin: top;
        transform: scaleY(0);
        transition: transform .5s;
    }
    ul li a:hover {
        color: #fff;
        text-decoration: none;
    }
    ul li a:hover span {
        transform-origin: bottom;
        transform: scaleY(1);
    }
    ul li a span:nth-child(1) {
        left: 0;
        transition-delay: 0s;
    }
    ul li a span:nth-child(2) {
        left: 25%;
        transition-delay: 0.15s;
    }
    ul li a span:nth-child(3) {
        left: 50%;
        transition-delay: 0.3s;
    }
    ul li a span:nth-child(4) {
        left: 75%;
        transition-delay: 0.45s;
    }
    .litres{
        height:30px;
        margin-left:50px;
    }
    .divider{
     position: absolute;
    height: 1px;
    left: 20%;
    right: 0px;
    width: 60%;
    opacity: 0.3;
    background: #000000;
    }
    .about{
    position: relative;
    top:-110px;
    left:60%;
    width:30%;
    line-height: 1px;
    font-weight:bold;
    }
    .head-about{
        font-weight:bold;
        margin-top:-90px;
    }
    .name_text{
        font-size:20px;
        font-weight:bold;
        margin-top:-150px;
    }
    .logo-foot{
        margin-left:1%;
        margin-top:70px;
        height:70px;
        width:auto;
    }
    .logo-head{
        margin-left:65%;
        margin-top:70px;
        height:70px;
        width:auto;
    }
    header{width:100%;
        background-color:#f7f0f0;
        height:200px;
    }
    footer{
        width:100%;
        background-color:#f7f0f0;
        height:150px;
    }
    .add{
        width:60%;
        line-height: 21px;
        height:auto;
        position:relative;
        margin-left:20%;
    }
    .tank{
        width:60%;
        height:auto;
        line-height: 21px;
        position:relative;
        margin-left:20%;
    }
    label{
        width:40%;
    }
    .button-add{
        width:80px;
        margin-left:30%;
        border: 1.5px solid black;
    }
    input {
        border: 2px solid grey;
    width: 100%;
    padding: 2px 5px;
    margin: 2px 0;
    box-sizing: border-box;
    }

    input[type=button]{
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 4px 7px;
    text-decoration: none;
    margin: 2px 1px;
    cursor: pointer;
    }
    tr:hover {background-color: #f5f5f5;}
    table {
        margin-left:20%;
        width:60%;
    border-spacing: 0 10px;
    font-family: 'Open Sans', sans-serif;
    font-weight: bold;
    }
    th {
    padding: 10px 20px;
    background: #56433D;
    color: #F9C941;
    border-right: 2px solid; 
    font-size: 0.9em;
    }
    th:first-child {
    text-align: left;
    }
    th:last-child {
    border-right: none;
    }
    td {
    vertical-align: middle;
    padding: 10px;
    font-size: 14px;
    text-align: center;
    border-top: 2px solid #56433D;
    border-bottom: 2px solid #56433D;
    border-right: 2px solid #56433D;
    }
    td:first-child {
    border-left: 2px solid #56433D;
    border-right: none;
    }
    td:nth-child(2){
    text-align: left;
    }
</style>
<script language="javascript">
var app = new Vue({
  el: '#vueapp',
  data: {
      name: '',
      tank: '',
      litres:'',
      new_litres:[],
      tanks: [],
      fill:[],
      value: 45,
      max: 300
  },
  mounted: function () {
    console.log('Hello from Vue!')
    this.getTanks() /* получаем данные по емкостям */
    this.getFillers()/* данные по наливайщикам */
  },
  methods: {
    getTanks: function(){ /* функция получения данных по емкостям */
        axios.get('api/tanks.php')
        .then(function (response) {
            console.log(response.data);
            app.tanks = response.data; /* здесь в итоге и получаются нужные данные  */
        })
        .catch(function (error) {
            console.log(error);
        });
    },
    getFillers: function(){ /* данные по наливайщикам */
        axios.get('api/fillers.php')
        .then(function (response) {
            console.log(response.data);
            app.fill = response.data; /* здесь в итоге и получаются нужные данные  */
        })
        .catch(function (error) {
            console.log(error);
        });
    },
    updateTank: function(){ /* обновляем данные о ёмкостях  */
        console.log("Update Tank!")
        let formData = new FormData();
            console.log(app.tanks[1].litres)
            let new_litres = [];
            for(i=0;i<5;i++){
            new_litres.push(Math.floor(Number(this.litres)/5)+Number(app.tanks[i].litres)) /* добавляем в массив то, что точно добавим везде одинаково  */
            }
            if(this.litres %5 !=0){ /* если не поровну всем  */
                remainder = this.litres %5
                while (remainder>0){/* пока остаток больше 0  */
                    let temp=0
                    for (i=0;i<4;i++) /* в этом цикле я ищу откуда начинать  */
                    { 
                        if(new_litres[i]>new_litres[i+1]) /* если иду сюда значит где-то было больше и начинаю заполнять со следующей цистерны  */
                        {
                            if (temp==0){ 
                                temp=i+1
                            }
                        }
                    }
                    for (i=temp; i<5;i++){ /*  тут делаю проход заполняя по 1 литру  */
                        if(remainder>0){ /* заполняю пока есть остаток, если остаток остался а круг закончен то в while идём ещё раз  */
                        new_litres[i]+=1
                        remainder-=1
                        }
                    }
                }
            }
            var sum = 0;
                for(var i = 0; i < new_litres.length; i++){  /* проверка что литры не перельются 
                    p.s. Решил что если больше то вообще ничего не залью, но можно и залить что можно а там сказать что ошибка */
                    sum += new_litres[i];
                }
                if(sum>1500){
                        alert("Перебор!! Вы пытаетесь залить лишние "+(sum-1500)+' литров');
                        return;
                }    
                formData.append('litres_added1', new_litres[0]) /* пока что так отправляю данные по каждой цистерне, но попробую отправить массив  */
                formData.append('litres_added2', new_litres[1])
                formData.append('litres_added3', new_litres[2])
                formData.append('litres_added4', new_litres[3])
                formData.append('litres_added5', new_litres[4])
                var tank = {};
                formData.forEach(function(value, key){
                    tank[key] = value;
                });
                console.log(formData);
                axios({
                    method: 'post',
                    url: 'api/tanks.php',
                    data: formData,
                    config: { headers: {'Content-Type': 'multipart/form-data' }}
                })
        this.createFill()
    },
    createFill: function() { /* тут добавляю наливайщика в бд. всё стандартно  */
        console.log("Create filler!")
        let formData = new FormData();
        formData.append('name', this.name)
        formData.append('litres', this.litres)
                
        var fill = {};
        formData.forEach(function(value, key){
               fill[key] = value;
        });
        axios({
            method: 'post',
            url: 'api/fillers.php',
            data: formData,
            config: { headers: {'Content-Type': 'multipart/form-data' }}
        })
        .then(function (response) {
            console.log(response)
            app.tanks.push(tank)
            this.getTanks();
            this.getFillers();
        })
        .catch(function (response) {
            console.log(response)
        });
    },
    resetForm: function(){ /*  очистка формы */
        this.name = '';
        this.litres = '';
    },
  }
}
)    
</script>
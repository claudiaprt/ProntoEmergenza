<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="stylesMobile.css">
    <script src="script.js"></script>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="month">
                <h2>Maggio 2024</h2>
                <div class="calendar">
                    <div class="day">Lun</div>
                    <div class="day">Mar</div>
                    <div class="day">Mer</div>
                    <div class="day">Gio</div>
                    <div class="day">Ven</div>
                    <div class="day">Sab</div>
                    <div class="day">Dom</div>
                    <div class="date"></div>
                    <div class="date"></div>
                    <div class="date validato" onclick="showDate('2024-05-01')">1</div>
                    <div class="date" onclick="showDate('2024-05-02')">2</div>
                    <div class="date" onclick="showDate('2024-05-03')">3</div>
                    <div class="date" onclick="showDate('2024-05-04')">4</div>
                    <div class="date" onclick="showDate('2024-05-05')">5</div>
                    <div class="date" onclick="showDate('2024-05-06')">6</div>
                    <div class="date" onclick="showDate('2024-05-07')">7</div>
                    <div class="date" onclick="showDate('2024-05-08')">8</div>
                    <div class="date validato" onclick="showDate('2024-05-09')">9</div>
                    <div class="date" onclick="showDate('2024-05-10')">10</div>
                    <div class="date" onclick="showDate('2024-05-11')">11</div>
                    <div class="date" onclick="showDate('2024-05-12')">12</div>
                    <div class="date" onclick="showDate('2024-05-13')">13</div>
                    <div class="date parzComp" onclick="showDate('2024-05-14')">14</div>
                    <div class="date" onclick="showDate('2024-05-15')">15</div>
                    <div class="date" onclick="showDate('2024-05-16')">16</div>
                    <div class="date" onclick="showDate('2024-05-17')">17</div>
                    <div class="date" onclick="showDate('2024-05-18')">18</div>
                    <div class="date" onclick="showDate('2024-05-19')">19</div>
                    <div class="date completo" onclick="showDate('2024-05-20')">20</div>
                    <div class="date" onclick="showDate('2024-05-21')">21</div>
                    <div class="date" onclick="showDate('2024-05-22')">22</div>
                    <div class="date" onclick="showDate('2024-05-23')">23</div>
                    <div class="date completo" onclick="showDate('2024-05-24')">24</div>
                    <div class="date" onclick="showDate('2024-05-25')">25</div>
                    <div class="date" onclick="showDate('2024-05-26')">26</div>
                    <div class="date completo" onclick="showDate('2024-05-27')">27</div>
                    <div class="date" onclick="showDate('2024-05-28')">28</div>
                    <div class="date" onclick="showDate('2024-05-29')">29</div>
                    <div class="date" onclick="showDate('2024-05-30')">30</div>
                    <div class="date" onclick="showDate('2024-05-31')">31</div>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="schedule">
                <div class="header">
                    <div class="cell"></div>
                    <div class="cell">SOCCORRITORE</div>
                    <div class="cell">SOCCORRITORE</div>
                    <div class="cell">AUTISTA</div>
                </div>
                <div class="row">
                    <div class="cell time">MATT.</div>
                    <div class="cell">nomi</div>
                    <div class="cell">nomi</div>
                    <div class="cell">nomi</div>
                </div>
                <div class="row">
                    <div class="cell time">POME.</div>
                    <div class="cell">nomi</div>
                    <div class="cell">nomi</div>
                    <div class="cell">nomi</div>
                </div>
                <div class="row">
                    <div class="cell time">NOTTE</div>
                    <div class="cell">nomi</div>
                    <div class="cell">nomi</div>
                    <div class="cell">nomi</div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
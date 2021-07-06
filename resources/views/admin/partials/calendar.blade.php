<div class="container-calendar">

    <h3 id="monthAndYear"></h3>
  
    <div class="button-container-calendar">
      <button id="previous" onclick="previous()">&#8249;</button>
      <button id="next" onclick="next()">&#8250;</button>
    </div>
  
    <table class="table-calendar" id="calendar" data-lang="en">
      <thead id="thead-month"></thead>
      <tbody id="calendar-body"></tbody>
    </table>
  
    <div class="footer-container-calendar">
      <label for="month">Aller à: </label>
      <select id="month" onchange="jump()">
        <option value=0>Janvier</option>
        <option value=1>Fevreir</option>
        <option value=2>Mars</option>
        <option value=3>Avril</option>
        <option value=4>Mai</option>
        <option value=5>Juin</option>
        <option value=6>Juillet</option>
        <option value=7>Aout</option>
        <option value=8>Septembre</option>
        <option value=9>Octobre</option>
        <option value=10>Novembre</option>
        <option value=11>Decembre</option>
      </select>
      <select id="year" onchange="jump()"></select>
    </div>
    
  </div>
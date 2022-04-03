  </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- summer text editor -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- Dropzone for uploading multiple images -->
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>


  <!-- my script -->
    <script src="js/scripts.js"></script>

    <!-- the Google Chart: -->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Views',    <?php echo $session->count; ?>],
          ['Photos',      <?php echo Photo::count_all(); ?>],
          ['Users',  <?php echo User::count_all() ?>],
          ['Comments', <?php echo Comment::count_all() ?>],
          
        ]);

        var options = {
          legend: 'none',
          pieSliceText: 'label',
          backgroundColor: 'transparent',
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
</body>

</html>

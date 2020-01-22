<script>
function filterFunction() {
  var title, titleFilter, tagFilter, table, tr, noteTitle, noteTag, i, titleValue, tagValue, allTag;
  title = document.getElementById("noteFilter");
  tag = document.getElementById("tagSelect").value;
  titleFilter = title.value.toUpperCase();
  tagFilter = title.value.toUpperCase();
  table = document.getElementById("noteTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    noteTitle = tr[i].getElementsByTagName("td")[0];
    noteTag = tr[i].getElementsByTagName("td")[1];

    if (noteTitle) {
      titleValue = noteTitle.textContent || noteTitle.innerText;
      tagValue = noteTag.textContent || noteTag.innerText;
      allTag = 0;

      if(tag == 'All') {
        allTag = 1;
      }

      if (titleValue.toUpperCase().indexOf(titleFilter) > -1 && (tagValue.indexOf(tag) > -1 || allTag)) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
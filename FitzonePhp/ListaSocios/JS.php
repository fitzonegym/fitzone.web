    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script> 
    <script src="assets/js/main.js"></script>

    <!-- Custom JS for filtering, searching, sorting, and edit mode -->
    <script>
      document.getElementById('search').addEventListener('input', function() {
          let filter = this.value.toUpperCase();
          let rows = document.querySelectorAll('#socios-table tr');
          rows.forEach(row => {
              let name = row.cells[1].textContent.toUpperCase();
              row.style.display = name.includes(filter) ? '' : 'none';
          });
      });

      document.getElementById('filter').addEventListener('change', filterTable);

      document.getElementById('sort').addEventListener('change', sortTable);

      let currentPage = 1;
      const recordsPerPage = 9;
      const totalRecords = <?php echo $CantidadUsuarios; ?>;
      const totalPages = Math.ceil(totalRecords / recordsPerPage);

      function displayRecords(page) {
          let startIndex = (page - 1) * recordsPerPage;
          let endIndex = startIndex + recordsPerPage;
          let slicedRecords = <?php echo json_encode(array_slice($ListadoUsuarios, 0, $CantidadUsuarios)); ?>;
          let output = '';

          for (let i = startIndex; i < endIndex && i < totalRecords; i++) {
              output += `
                  <tr>
                      <td>${slicedRecords[i]['ID']}</td>
                      <td>${slicedRecords[i]['NOMBRE']} ${slicedRecords[i]['APELLIDO']}</td>
                      <td>${slicedRecords[i]['DNI']}</td>
                      <td>${slicedRecords[i]['DIRECCION']}</td>
                      <td>${slicedRecords[i]['EMAIL']}</td>
                      <td>${slicedRecords[i]['TELEFONO']}</td>
                      <td>x</td>
                  </tr>
              `;
          }
          document.getElementById('socios-table').innerHTML = output;
      }

      window.addEventListener('load', function() {
          displayRecords(currentPage);
      });

      document.getElementById('next-page').addEventListener('click', nextPage);

      document.getElementById('prev-page').addEventListener('click', prevPage);

      document.getElementById('edit-mode').addEventListener('click', toggleEditMode);

      function filterTable() {
          let filterType = this.value;
          let rows = document.querySelectorAll('#socios-table tr');
          rows.forEach(row => {
              if (filterType) {
                  let cell = row.cells[filterType === 'Nombre' ? 1 : filterType === 'Dni' ? 2 : 4].textContent.toUpperCase();
                  row.style.display = cell.includes(filterType.toUpperCase()) ? '' : 'none';
              } else {
                  row.style.display = '';
              }
          });
      }

      function sortTable() {
          let sortType = this.value;
          let rows = Array.from(document.querySelectorAll('#socios-table tr'));
          let tbody = document.getElementById('socios-table');
          rows.sort((a, b) => {
              let aText, bText;
              if (sortType.includes('Nombre')) {
                  let aName = a.cells[1].textContent.toUpperCase();
                  let bName = b.cells[1].textContent.toUpperCase();
                  return sortType.includes('Asc') ? aName.localeCompare(bName) : bName.localeCompare(aName);
              } else if (sortType.includes('Dni')) {
                  aText = parseInt(a.cells[2].textContent, 10);
                  bText = parseInt(b.cells[2].textContent, 10);
              } else if (sortType.includes('Id')) {
                  aText = parseInt(a.cells[0].textContent, 10);
                  bText = parseInt(b.cells[0].textContent, 10);
              }
              return sortType.includes('Asc') ? aText - bText : bText - aText;
          });
          rows.forEach(row => tbody.appendChild(row));
      }

      function nextPage() {
          if (currentPage < totalPages) {
              currentPage++;
              displayRecords(currentPage);
              document.getElementById('page-num').textContent = `${currentPage}`;
              document.getElementById('prev-page').disabled = false;
          }
          if (currentPage === totalPages) {
              this.disabled = true;
          }
      }

      function prevPage() {
          if (currentPage > 1) {
              currentPage--;
              displayRecords(currentPage);
              document.getElementById('page-num').textContent = `${currentPage}`;
              document.getElementById('next-page').disabled = false;
          }
          if (currentPage === 1) {
              this.disabled = true;
          }
      }


      function toggleEditMode() {
          let rows = document.querySelectorAll('#socios-table tr');
          let editMode = this.textContent === 'Entrar a modo edición';
          rows.forEach(row => {
              row.classList.toggle('edit-mode', editMode);
              let editColumn = document.getElementById('edit-column');
              editColumn.style.display = editMode ? '' : 'none';
              if (editMode) {
                  let editButton = document.createElement('button');
                  editButton.innerHTML = '<i class="bi bi-pencil"></i>';
                  editButton.classList.add('btn', 'btn-action', 'edit-btn');
                  editButton.addEventListener('click', () => enableRowEditing(row));
                  let deleteButton = document.createElement('button');
                  deleteButton.innerHTML = '<i class="bi bi-trash"></i>';
                  deleteButton.classList.add('btn', 'btn-action', 'delete-btn');
                  deleteButton.addEventListener('click', () => {
                      let confirmDelete = confirm('¿Estás seguro de eliminar este socio?');
                      if (confirmDelete) {
                          // Lógica para eliminar el socio
                      }
                  });
                  row.appendChild(editButton);
                  row.appendChild(deleteButton);
              } else {
                row.contentEditable = 'false'; // Deshabilitar la edición de la fila
                  let buttons = row.querySelectorAll('.btn-action');
                  buttons.forEach(button => button.remove());
              }
          });
          this.textContent = editMode ? 'Salir de modo edición' : 'Entrar a modo edición';
          document.querySelectorAll('.btn-action').forEach(button => {
              button.style.display = editMode ? 'inline-block' : 'none';
          });
      }

      function enableRowEditing(row) {
        // Verificar si la fila ya está en modo de edición
        if (row.classList.contains('edit-mode')) {
            // Desactivar la edición de la fila
            row.contentEditable = 'false';
            row.classList.remove('edit-mode');
        } else {
            // Habilitar la edición de la fila
            let rows = document.querySelectorAll('#socios-table tr');
            rows.forEach(r => {
                if (r !== row) {
                    r.contentEditable = 'false';
                    r.classList.remove('edit-mode');
                }
            });
            row.contentEditable = 'true';
            row.classList.add('edit-mode');
        }
      }

      function saveChanges() {
        let confirmSave = confirm('¿Deseas guardar los cambios?');
        if (confirmSave) {
            let editedRows = document.querySelectorAll('#socios-table tr.edit-mode');
            let updatedData = [];
            editedRows.forEach(row => {
              let rowData = {
                nombre: row.cells[1].textContent.split(' ')[0],
                apellido: row.cells[1].textContent.split(' ')[1],
                dni: row.cells[2].textContent,
                direccion: row.cells[3].textContent,
                email: row.cells[4].textContent,
                telefono: row.cells[5].textContent,
                action: 'update'
              };
              updatedData.push(rowData);
            });

          updatedData.forEach(data => {
              console.log('Sending data:', data); // Agrega esto para depurar
              fetch('ListaSocios.php', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/x-www-form-urlencoded'
                  },
                  body: new URLSearchParams(data)
              })
              .then(response => response.json())
              .then(result => {
                  console.log('Response:', result); // Agrega esto para depurar
                  if (result.status === 'success') {
                      alert(result.message);
                      location.reload();
                  } else {
                      alert(result.message);
                  }
              })
              .catch(error => console.error('Error:', error));
          });
        }
      }

        function deleteSocio(id) {
            let confirmDelete = confirm('¿Estás seguro de eliminar este socio?');
            if (confirmDelete) {
                console.log('Deleting ID:', id); // Agrega esto para depurar
                fetch('ListaSocios.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({ id: id, action: 'delete' })
                })
                .then(response => response.json())
                .then(result => {
                    console.log('Response:', result); // Agrega esto para depurar
                    if (result.status === 'success') {
                        alert(result.message);
                        location.reload();
                    } else {
                        alert(result.message);
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }

      document.getElementById('edit-mode').addEventListener('click', toggleEditMode);
      document.getElementById('edit-mode').addEventListener('click', function() {
          if (this.textContent === 'Entrar a modo edición') {
              saveChanges();
          }
      });

    </script>
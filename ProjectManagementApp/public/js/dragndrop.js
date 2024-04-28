document.addEventListener('DOMContentLoaded', (event) => {

  var dragSrcEl = null;

  function handleDragStart(e) {
      this.style.opacity = '0.1';
      this.style.border = '3px dashed #c4cad3';

      dragSrcEl = this;

      e.dataTransfer.effectAllowed = 'move';
      e.dataTransfer.setData('text/html', this.innerHTML);
  }

  function handleDragOver(e) {
      if (e.preventDefault) {
          e.preventDefault();
      }

      e.dataTransfer.dropEffect = 'move';

      return false;
  }

  function handleDragEnter(e) {
      this.classList.add('task-hover');
  }

  function handleDragLeave(e) {
      this.classList.remove('task-hover');
  }

  function handleDrop(e) {
      if (e.stopPropagation) {
          e.stopPropagation(); // stops the browser from redirecting.
      }

      if (dragSrcEl != this) {
          dragSrcEl.innerHTML = this.innerHTML;
          this.innerHTML = e.dataTransfer.getData('text/html');
      }

      return false;
  }

  function handleDragEnd(e) {
      this.style.opacity = '1';
      this.style.border = 0;

      items.forEach(function (item) {
          item.classList.remove('task-hover');
      });
  }


  let items = document.querySelectorAll('.task');
  items.forEach(function (item) {
      item.addEventListener('dragstart', handleDragStart, false);
      item.addEventListener('dragenter', handleDragEnter, false);
      item.addEventListener('dragover', handleDragOver, false);
      item.addEventListener('dragleave', handleDragLeave, false);
      item.addEventListener('drop', handleDrop, false);
      item.addEventListener('dragend', handleDragEnd, false);
  });

  let addTask = document.getElementById('add-task');
  addTask.addEventListener('click', function (e) {
      let sectionName = document.getElementById('sections');
      console.log(sectionName);
      let getH2 = document.getElementsByClassName('project-column-heading__title');

      for (let i = 0; i < getH2.length; i++) {
          let getTitle = getH2[i].innerHTML;
          switch (getTitle) {
              case "Task Ready":
                  let projectColumnClosest = getH2[i].closest('.project-column')
                  let date = new Date();
                  let title = document.getElementById("title").value;
                  let content = document.getElementById("content").value;

                  let defaultHtmlTask = `
                  <div class='task' draggable='true'>
                    <div class='task_tags'><span class='tasktag task_tag--design'>${title}</span><button
                        class='task__options'><i class="fas fa-ellipsis-h"></i></button></div>
                    <p>${content}</p>
                    <div class='task__stats'>
                      <span><time datetime="2021-11-24T20:00:00"><i class="fas fa-flag"></i>${date}</time></span>
                      <span><i class="fas fa-comment"></i>2</span>
                      <span><i class="fas fa-paperclip"></i>5</span>
                      <span class='task__owner'></span>
                    </div>
                  </div>
                  `
                  projectColumnClosest.insertAdjacentHTML('afterend', defaultHtmlTask);
                  break;
              default:
                  break;
          }
      }
  });
});
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    [].forEach.call(document.getElementsByClassName('tags-input'), function(el) {
        let hiddenInput = document.createElement('input'),
            mainInput = document.createElement('input'),
            tags = [];

        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', el.getAttribute('data-name'));
        hiddenInput.setAttribute('id', 'tags-val');

        mainInput.setAttribute('type', 'text');
        mainInput.classList.add('main-input');
        mainInput.addEventListener('input', function() {
            let enteredTags = mainInput.value.split(',');
            if (enteredTags.length > 1) {
                enteredTags.forEach(function(t) {
                    let filteredTag = filterTag(t);
                    if (filteredTag.length > 0)
                        addTag(filteredTag);
                });
                mainInput.value = '';
            }
        });

        mainInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                mainInput.value = mainInput.value + ',';
                let enteredTags = mainInput.value.split(',');
                if (enteredTags.length > 1) {
                    enteredTags.forEach(function(t) {
                        let filteredTag = filterTag(t);
                        if (filteredTag.length > 0)
                            addTag(filteredTag);
                    });
                    mainInput.value = '';
                }
            }
        });

        mainInput.addEventListener('keydown', function(e) {
            let keyCode = e.which || e.keyCode;
            if (keyCode === 8 && mainInput.value.length === 0 && tags.length > 0) {
                removeTag(tags.length - 1);
            }
        });

        el.appendChild(mainInput);
        el.appendChild(hiddenInput);

        function addTag(text) {
            let tag = {
                text: text,
                element: document.createElement('span'),
            };

            tag.element.classList.add('tag');
            tag.element.textContent = tag.text;

            let closeBtn = document.createElement('span');
            closeBtn.classList.add('close');
            closeBtn.addEventListener('click', function() {
                removeTag(tags.indexOf(tag));
            });
            tag.element.appendChild(closeBtn);

            tags.push(tag);

            el.insertBefore(tag.element, mainInput);

            refreshTags();

            data = {
                'tags': document.getElementById('tags-val').value
            };
            $.ajax({
                type: 'POST',
                url: "{{ route('tag-create').'?_token='.csrf_token() }}",
                data: data,
                success: function(result) {
                    console.log(result);
                }
            });
        }

        function removeTag(index) {
            let tag = tags[index];
            tags.splice(index, 1);
            el.removeChild(tag.element);
            refreshTags();

            data = {
                'tags': document.getElementById('tags-val').value
            };
            $.ajax({
                type: 'POST',
                url: "{{ route('tag-create').'?_token='.csrf_token() }}",
                data: data,
                success: function(result) {
                    if (result == 1)
                        console.log("OK");
                    else
                        console.log("Failed");
                }
            });
        }

        function refreshTags() {
            let tagsList = [];
            tags.forEach(function(t) {
                tagsList.push(t.text);
            });
            hiddenInput.value = tagsList.join(',');
            $('.main-input').val("");
        }

        function filterTag(tag) {
            return tag.replace(/[^\w -]/g, '').trim().replace(/\W+/g, '-');
        }
    });
</script>
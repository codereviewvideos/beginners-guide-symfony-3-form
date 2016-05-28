var manageOther = function(selectElement, manualEntry) {

    var getValueOfOther = function (selectElement) {
        var filteredResults = Array.prototype.filter.call(selectElement, function(optionElement) {
            return 'other' === optionElement.innerHTML.toLowerCase();
        });

        return filteredResults[0].value;
    };

    var isOther = function (currentlySelectedIndex) {
        return currentlySelectedIndex == getValueOfOther(selectElement);
    };


    var showOrHideManualEntryBox = function() {
        var currentlySelectedIndex = selectElement.options[selectElement.selectedIndex].value;
        var label = $('label[for="' + manualEntry.id + '"]');

        if (isOther(currentlySelectedIndex)) {
            manualEntry.style.display = 'block';
            label[0].style.display = 'block';
        } else {
            manualEntry.style.display = 'none';
            label[0].style.display = 'none';
        }
    };

    selectElement.addEventListener('change', showOrHideManualEntryBox);

    showOrHideManualEntryBox();
};

var presetChoice1 = document.getElementById('data_feed_timetable_presetChoice');
var manualEntry1 = document.getElementById('data_feed_timetable_manualEntry');

manageOther(presetChoice1, manualEntry1);



var presetChoice2 = document.getElementById('data_feed_anotherTimetable_presetChoice');
var manualEntry2 = document.getElementById('data_feed_anotherTimetable_manualEntry');

manageOther(presetChoice2, manualEntry2);
// classes
//import CLASSES from './classes/main.js';

// features
//import FEATURE_MAPPING from './features/mapping.js';

// commands
//import COMMAND_VIDEO_MODAL from './features/commands/video-modal.js';

// views
//import VIEW_VIDEO_MODAL from './features/views/video-modal.js';

// lodash imports
import lodash_throttle from 'lodash.throttle';
import lodash_debounce from 'lodash.debounce';

// the webapp functionality
window.webapp = window.webapp || {};
window.webapp = Object.assign(window.webapp, {
	data: {
		breakpoints : {
			responsiveBreakPoint1 : 480,
			responsiveBreakPoint2 : 768,
			responsiveBreakPoint3 : 992,
			responsiveBreakPoint4 : 1200
		}
	},
	lodash : {
		throttle : lodash_throttle,
		debounc : lodash_debounce
	},
	func: {
		
	}
});

// on document ready here
document.addEventListener("DOMContentLoaded", function() {
	
});
"use strict";

//dev9

function makeid() {
    let t = "", e = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    for (let i = 0; i < 120; i++) t += e.charAt(Math.floor(Math.random() * e.length));
    return t
}

function MD5(string) {
    /**
     * @return {number}
     */
    function RotateLeft(lValue, iShiftBits) {
        return (lValue << iShiftBits) | (lValue >>> (32 - iShiftBits));
    }

    function AddUnsigned(lX, lY) {
        let lX4, lY4, lX8, lY8, lResult;
        lX8 = (lX & 0x80000000);
        lY8 = (lY & 0x80000000);
        lX4 = (lX & 0x40000000);
        lY4 = (lY & 0x40000000);
        lResult = (lX & 0x3FFFFFFF) + (lY & 0x3FFFFFFF);
        if (lX4 & lY4) {
            return (lResult ^ 0x80000000 ^ lX8 ^ lY8);
        }
        if (lX4 | lY4) {
            if (lResult & 0x40000000) {
                return (lResult ^ 0xC0000000 ^ lX8 ^ lY8);
            } else {
                return (lResult ^ 0x40000000 ^ lX8 ^ lY8);
            }
        } else {
            return (lResult ^ lX8 ^ lY8);
        }
    }

    function F(x, y, z) {
        return (x & y) | ((~x) & z);
    }

    function G(x, y, z) {
        return (x & z) | (y & (~z));
    }

    function H(x, y, z) {
        return (x ^ y ^ z);
    }

    function I(x, y, z) {
        return (y ^ (x | (~z)));
    }

    function FF(a, b, c, d, x, s, ac) {
        a = AddUnsigned(a, AddUnsigned(AddUnsigned(F(b, c, d), x), ac));
        return AddUnsigned(RotateLeft(a, s), b);
    }

    function GG(a, b, c, d, x, s, ac) {
        a = AddUnsigned(a, AddUnsigned(AddUnsigned(G(b, c, d), x), ac));
        return AddUnsigned(RotateLeft(a, s), b);
    }

    function HH(a, b, c, d, x, s, ac) {
        a = AddUnsigned(a, AddUnsigned(AddUnsigned(H(b, c, d), x), ac));
        return AddUnsigned(RotateLeft(a, s), b);
    }

    function II(a, b, c, d, x, s, ac) {
        a = AddUnsigned(a, AddUnsigned(AddUnsigned(I(b, c, d), x), ac));
        return AddUnsigned(RotateLeft(a, s), b);
    }

    function ConvertToWordArray(string) {
        let lWordCount;
        let lMessageLength = string.length;
        let lNumberOfWords_temp1 = lMessageLength + 8;
        let lNumberOfWords_temp2 = (lNumberOfWords_temp1 - (lNumberOfWords_temp1 % 64)) / 64;
        let lNumberOfWords = (lNumberOfWords_temp2 + 1) * 16;
        let lWordArray = Array(lNumberOfWords - 1);
        let lBytePosition = 0;
        let lByteCount = 0;
        while (lByteCount < lMessageLength) {
            lWordCount = (lByteCount - (lByteCount % 4)) / 4;
            lBytePosition = (lByteCount % 4) * 8;
            lWordArray[lWordCount] = (lWordArray[lWordCount] | (string.charCodeAt(lByteCount) << lBytePosition));
            lByteCount++;
        }
        lWordCount = (lByteCount - (lByteCount % 4)) / 4;
        lBytePosition = (lByteCount % 4) * 8;
        lWordArray[lWordCount] = lWordArray[lWordCount] | (0x80 << lBytePosition);
        lWordArray[lNumberOfWords - 2] = lMessageLength << 3;
        lWordArray[lNumberOfWords - 1] = lMessageLength >>> 29;
        return lWordArray;
    }

    /**
     * @return {string}
     */
    function WordToHex(lValue) {
        let WordToHexValue = "", WordToHexValue_temp = "", lByte, lCount;
        for (lCount = 0; lCount <= 3; lCount++) {
            lByte = (lValue >>> (lCount * 8)) & 255;
            WordToHexValue_temp = "0" + lByte.toString(16);
            WordToHexValue = WordToHexValue + WordToHexValue_temp.substr(WordToHexValue_temp.length - 2, 2);
        }
        return WordToHexValue;
    }

    /**
     * @return {string}
     */
    function Utf8Encode(string) {
        string = string.replace(/\r\n/g, "\n");
        let utftext = "";

        for (var n = 0; n < string.length; n++) {

            var c = string.charCodeAt(n);

            if (c < 128) {
                utftext += String.fromCharCode(c);
            }
            else if ((c > 127) && (c < 2048)) {
                utftext += String.fromCharCode((c >> 6) | 192);
                utftext += String.fromCharCode((c & 63) | 128);
            }
            else {
                utftext += String.fromCharCode((c >> 12) | 224);
                utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                utftext += String.fromCharCode((c & 63) | 128);
            }

        }
        return utftext;
    }

    let x = Array();
    let k, AA, BB, CC, DD, a, b, c, d;
    let S11 = 7, S12 = 12, S13 = 17, S14 = 22;
    let S21 = 5, S22 = 9, S23 = 14, S24 = 20;
    let S31 = 4, S32 = 11, S33 = 16, S34 = 23;
    let S41 = 6, S42 = 10, S43 = 15, S44 = 21;

    string = Utf8Encode(string);

    x = ConvertToWordArray(string);

    a = 0x67452301;
    b = 0xEFCDAB89;
    c = 0x98BADCFE;
    d = 0x10325476;

    for (k = 0; k < x.length; k += 16) {
        AA = a;
        BB = b;
        CC = c;
        DD = d;
        a = FF(a, b, c, d, x[k + 0], S11, 0xD76AA478);
        d = FF(d, a, b, c, x[k + 1], S12, 0xE8C7B756);
        c = FF(c, d, a, b, x[k + 2], S13, 0x242070DB);
        b = FF(b, c, d, a, x[k + 3], S14, 0xC1BDCEEE);
        a = FF(a, b, c, d, x[k + 4], S11, 0xF57C0FAF);
        d = FF(d, a, b, c, x[k + 5], S12, 0x4787C62A);
        c = FF(c, d, a, b, x[k + 6], S13, 0xA8304613);
        b = FF(b, c, d, a, x[k + 7], S14, 0xFD469501);
        a = FF(a, b, c, d, x[k + 8], S11, 0x698098D8);
        d = FF(d, a, b, c, x[k + 9], S12, 0x8B44F7AF);
        c = FF(c, d, a, b, x[k + 10], S13, 0xFFFF5BB1);
        b = FF(b, c, d, a, x[k + 11], S14, 0x895CD7BE);
        a = FF(a, b, c, d, x[k + 12], S11, 0x6B901122);
        d = FF(d, a, b, c, x[k + 13], S12, 0xFD987193);
        c = FF(c, d, a, b, x[k + 14], S13, 0xA679438E);
        b = FF(b, c, d, a, x[k + 15], S14, 0x49B40821);
        a = GG(a, b, c, d, x[k + 1], S21, 0xF61E2562);
        d = GG(d, a, b, c, x[k + 6], S22, 0xC040B340);
        c = GG(c, d, a, b, x[k + 11], S23, 0x265E5A51);
        b = GG(b, c, d, a, x[k + 0], S24, 0xE9B6C7AA);
        a = GG(a, b, c, d, x[k + 5], S21, 0xD62F105D);
        d = GG(d, a, b, c, x[k + 10], S22, 0x2441453);
        c = GG(c, d, a, b, x[k + 15], S23, 0xD8A1E681);
        b = GG(b, c, d, a, x[k + 4], S24, 0xE7D3FBC8);
        a = GG(a, b, c, d, x[k + 9], S21, 0x21E1CDE6);
        d = GG(d, a, b, c, x[k + 14], S22, 0xC33707D6);
        c = GG(c, d, a, b, x[k + 3], S23, 0xF4D50D87);
        b = GG(b, c, d, a, x[k + 8], S24, 0x455A14ED);
        a = GG(a, b, c, d, x[k + 13], S21, 0xA9E3E905);
        d = GG(d, a, b, c, x[k + 2], S22, 0xFCEFA3F8);
        c = GG(c, d, a, b, x[k + 7], S23, 0x676F02D9);
        b = GG(b, c, d, a, x[k + 12], S24, 0x8D2A4C8A);
        a = HH(a, b, c, d, x[k + 5], S31, 0xFFFA3942);
        d = HH(d, a, b, c, x[k + 8], S32, 0x8771F681);
        c = HH(c, d, a, b, x[k + 11], S33, 0x6D9D6122);
        b = HH(b, c, d, a, x[k + 14], S34, 0xFDE5380C);
        a = HH(a, b, c, d, x[k + 1], S31, 0xA4BEEA44);
        d = HH(d, a, b, c, x[k + 4], S32, 0x4BDECFA9);
        c = HH(c, d, a, b, x[k + 7], S33, 0xF6BB4B60);
        b = HH(b, c, d, a, x[k + 10], S34, 0xBEBFBC70);
        a = HH(a, b, c, d, x[k + 13], S31, 0x289B7EC6);
        d = HH(d, a, b, c, x[k + 0], S32, 0xEAA127FA);
        c = HH(c, d, a, b, x[k + 3], S33, 0xD4EF3085);
        b = HH(b, c, d, a, x[k + 6], S34, 0x4881D05);
        a = HH(a, b, c, d, x[k + 9], S31, 0xD9D4D039);
        d = HH(d, a, b, c, x[k + 12], S32, 0xE6DB99E5);
        c = HH(c, d, a, b, x[k + 15], S33, 0x1FA27CF8);
        b = HH(b, c, d, a, x[k + 2], S34, 0xC4AC5665);
        a = II(a, b, c, d, x[k + 0], S41, 0xF4292244);
        d = II(d, a, b, c, x[k + 7], S42, 0x432AFF97);
        c = II(c, d, a, b, x[k + 14], S43, 0xAB9423A7);
        b = II(b, c, d, a, x[k + 5], S44, 0xFC93A039);
        a = II(a, b, c, d, x[k + 12], S41, 0x655B59C3);
        d = II(d, a, b, c, x[k + 3], S42, 0x8F0CCC92);
        c = II(c, d, a, b, x[k + 10], S43, 0xFFEFF47D);
        b = II(b, c, d, a, x[k + 1], S44, 0x85845DD1);
        a = II(a, b, c, d, x[k + 8], S41, 0x6FA87E4F);
        d = II(d, a, b, c, x[k + 15], S42, 0xFE2CE6E0);
        c = II(c, d, a, b, x[k + 6], S43, 0xA3014314);
        b = II(b, c, d, a, x[k + 13], S44, 0x4E0811A1);
        a = II(a, b, c, d, x[k + 4], S41, 0xF7537E82);
        d = II(d, a, b, c, x[k + 11], S42, 0xBD3AF235);
        c = II(c, d, a, b, x[k + 2], S43, 0x2AD7D2BB);
        b = II(b, c, d, a, x[k + 9], S44, 0xEB86D391);
        a = AddUnsigned(a, AA);
        b = AddUnsigned(b, BB);
        c = AddUnsigned(c, CC);
        d = AddUnsigned(d, DD);
    }
    let temp = WordToHex(a) + WordToHex(b) + WordToHex(c) + WordToHex(d);
    return temp.toLowerCase();
}

let idbKeyval = (function (exports) {
    'use strict';

    class Store {
        constructor(dbName = 'keyval-store', storeName = 'keyval') {
            this.storeName = storeName;
            this._dbp = new Promise((resolve, reject) => {
                const openreq = indexedDB.open(dbName, 1);
                openreq.onerror = () => reject(openreq.error);
                openreq.onsuccess = () => resolve(openreq.result);
                // First time setup: create an empty object store
                openreq.onupgradeneeded = () => {
                    openreq.result.createObjectStore(storeName);
                };
            });
        }

        _withIDBStore(type, callback) {
            return this._dbp.then(db => new Promise((resolve, reject) => {
                const transaction = db.transaction(this.storeName, type);
                transaction.oncomplete = () => resolve();
                transaction.onabort = transaction.onerror = () => reject(transaction.error);
                callback(transaction.objectStore(this.storeName));
            }));
        }
    }

    let store;

    function getDefaultStore() {
        if (!store)
            store = new Store();
        return store;
    }

    function get(key, store = getDefaultStore()) {
        let req;
        return store._withIDBStore('readonly', store => {
            req = store.get(key);
        }).then(() => req.result);
    }

    function set(key, value, store = getDefaultStore()) {
        return store._withIDBStore('readwrite', store => {
            store.put(value, key);
        });
    }

    function del(key, store = getDefaultStore()) {
        return store._withIDBStore('readwrite', store => {
            store.delete(key);
        });
    }

    function clear(store = getDefaultStore()) {
        return store._withIDBStore('readwrite', store => {
            store.clear();
        });
    }

    function keys(store = getDefaultStore()) {
        const keys = [];
        return store._withIDBStore('readonly', store => {
            // This would be store.getAllKeys(), but it isn't supported by Edge or Safari.
            // And openKeyCursor isn't supported by Safari.
            (store.openKeyCursor || store.openCursor).call(store).onsuccess = function () {
                if (!this.result)
                    return;
                keys.push(this.result.key);
                this.result.continue();
            };
        }).then(() => keys);
    }

    exports.Store = Store;
    exports.get = get;
    exports.set = set;
    exports.del = del;
    exports.clear = clear;
    exports.keys = keys;

    return exports;

}({}));

self.addEventListener("install", function (ev) {
    ev.waitUntil(self.skipWaiting())
});

//bu5
let showN = function (msgdata) {
    let dk = MD5("" + msgdata.body + msgdata.title);
    console.log('show: ' + dk);
    return idbKeyval.set(dk, Date.now()).then(() => self.registration.showNotification(msgdata.title, {
        body: msgdata.body,
        icon: msgdata.icon,
        badge: msgdata.badge,
        image: msgdata.image,
        vibrate: msgdata.vibrate,
        sound: msgdata.sound,
        sticky: !0,
        noscreen: !1,
        tag: "tag_12",
        renotify: true,
        requireInteraction: !0,
        timestamp: msgdata.ts,
        data: {
            url: msgdata.url,
            cid: msgdata.cid
        }
    }));
};

let checkLdb = dk => new Promise((resolve, reject) => {
    idbKeyval.get(dk).then(val => {
        console.log('Check: ' + dk + ' new:' + ('undefined' === typeof val));
        resolve(('undefined' === typeof val))
    });
});

let deletExpiredKeys = () => {
    idbKeyval
        .keys()
        .then((keys) => {
            let checkPromises = [];
            for (let key of keys) {
                if (key.length === 32) {
                    checkPromises.push(new Promise((resolve, reject) => {
                        idbKeyval.get(key).then(val => {
                            let keyExpired = (Date.now() >= val + (7 * 24 * 60 * 60 * 1000));
                            let d = new Date();
                            d.setTime(val);
                            if (keyExpired) {
                                console.log('Del EX: ' + key + '=>' + d + val + ' expired:' + keyExpired);
                                idbKeyval.del(key);
                            }
                            resolve()
                        });
                    }));
                }
            }
            return Promise.all(checkPromises).then();
        });
};

let createFeedBody = (ev) => {
    return idbKeyval.get('MegaPid').then((pid_hash) => {
        return idbKeyval.get('MegaS1').then((s1) => {
            const e = {timestamp: Math.floor(Date.now() / 1e3), type: "lp", uid: (ev.data ? ev.data.text() : JSON.stringify({cid: 'push'}))};
            const i = new FormData;
            i.append('mm', 'pu');
            i.append('pid', 785170);
            if (pid_hash) {
                i.append('pid_hash', '' + pid_hash);
            }
            if (s1) {
                i.append('s1', s1);
            }
            i.append('limit', '8');
            i.append('json', JSON.stringify(e));
            return i;
        });
    });
};

self.addEventListener("push", function (ev) {
    deletExpiredKeys();
    ev.waitUntil(
        createFeedBody(ev).then((i) => {
            return fetch('https://medianati.com/code/feed/', {
                method: "POST",
                body: i
            });
        }).then(t => {
            if (t.status !== 200) {
                throw new Error('Fetch errror Status Code: ' + t.status);
            }
            return t.json();
        }).then(msgs => {
            if (!msgs) {
                throw new Error('Fetch error empty msgs');
            }
            if (msgs[0] && msgs[0].pid_hash) {
                idbKeyval.set('MegaPid', '' + msgs[0].pid_hash + '');
            }
            if (msgs[0] && msgs[0].s1) {
                idbKeyval.set('MegaS1', '' + msgs[0].s1 + '');
            }
            let newmsgs = [];
            let promise = Promise.resolve();
            for (let msgdata of msgs) {
                let dk = MD5("" + msgdata.body + msgdata.title);
                promise = promise.then(() => checkLdb(dk))
                    .then(result => {
                        if (result) newmsgs.push(msgdata);
                    });
            }
            return promise.then(() => (newmsgs.length ? newmsgs : [msgs[Math.floor(Math.random() * msgs.length)]]));
        }).then(newmsgs => {
            return showN(newmsgs[0]);
        }).catch(err => {
            console.error('Error', err);
        })
    );
});

self.addEventListener('notificationclick', function (ev) {
    let e = makeid();
    let i = ev.notification.data.url.replace("{clid}", e);
    const n = {timestamp: Math.floor(Date.now() / 1e3), type: 'click', cid: ev.notification.data.cid, clid: e};
    const o = new FormData;
    o.append('json', JSON.stringify(n));
    fetch('https://' + "dotems.com" + '/code/pc/', {
        method: "POST",
        body: o
    });
    ev.notification.close();
    ev.waitUntil(clients.matchAll({type: 'window'}).then(function (t) {
        for (let e = 0; e < t.length; e++) {
            const i = t[e];
            if ('/' === i.url && 'focus' in i) return i.focus()
        }
        if (clients.openWindow) return clients.openWindow(i || '/')
    }));
});

self.addEventListener("notificationclose", function (ev) {
    const e = {timestamp: Math.floor(Date.now() / 1e3), type: 'close', cid: ev.notification.data.cid};
    const i = new FormData;
    i.append('json', JSON.stringify(e));
    ev.waitUntil(
        fetch('https://' + "dotems.com" + '/code/pc/', {method: 'POST', body: i})
    );
});
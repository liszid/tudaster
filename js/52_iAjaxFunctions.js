const iAjaxFunctions = (iAjaxFunctions = Object) => class extends iAjaxFunctions
{
    constructor()
    {
        super();
    }

/*
 * Checks if file exists
 * @param url string
 * @return bool
 * @author Liszi Dániel
 * @since 2020.11.10
 */
    funcFileExists(url)
    {
        let xhttp = new XMLHttpRequest();
        xhttp.open('HEAD', url, true);
        xhttp.send();
        return xhttp.status!=404;
    }

/*
 * Finds the original element recursively
 * @param srcTag object
 * @param srcTagName string
 * @return on success object, on fail false
 * @author Liszi Dániel
 * @since 2020.11.10
 */
    findSource(srcTag, srcTagName)
    {
        if (srcTag.tagName.toLowerCase() !== 'body') {
            if (srcTag.tagName.toLowerCase() === srcTagName) {
                return srcTag;
            } else {
                return this.findSource(srcTag.parentElement, srcTagName);
            }
        } else {
            return false;
        }
    }

/*
 * Enlarges specific modals
 * @param lmnt string
 * @author Liszi Dániel
 * @since 2020.11.10
 */
    enlargenModal(lmnt)
    {
        if (this.enlargeModal.indexOf(lmnt) > -1 && ( ! this.checkTag("errormessage") && ! this.checkTag("modalmessage"))) {
            if(! this.modalDialogElement.classList.contains("modal-lg")) {
                this.modalDialogElement.classList.add("modal-lg");
            }
        } else {
            if (this.modalDialogElement.classList.contains("modal-lg")) {
                this.modalDialogElement.classList.remove("modal-lg");
            }
        }
    }

/*
 * Checks if element by tagname exists
 * @param tagname string
 * @return bool
 * @author Liszi Dániel
 * @since 2020.11.10
 */
    checkTag(tagname)
    {
        return (!document.getElementsByTagName(tagname))? true : false;
    }
};

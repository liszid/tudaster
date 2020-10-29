/*  -----------------------------------------------------
*   JavaScript Part
*/

class Compile extends iAjax(iAjaxEvnts())
{
    constructor()
    {
	super();
	this.evntHrefs();
	this.loadContent();
    }
}

const Instance = new Compile();

/*  -----------------------------------------------------
*   JQuery Part
*/

import {SimpleAction} from "./simple-action";

export class ActionListUnordered extends SimpleAction {

  protected commandName: string = 'insertUnorderedList';

  protected hotKey: string = this.composeHotKey('shift+u');

  getDescription(): string {
    return "Insert unordered list";
  }

  getIcon(): string {
    return "fa fa-list-ul";
  }

  getName(): string {
    return "toolbar.list.unordered";
  }

}